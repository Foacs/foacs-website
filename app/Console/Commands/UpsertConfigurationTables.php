<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpsertConfigurationTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upsert:configuration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upsert the configurations tables.';

    private $_models = [
        'App\Models\Role',
        'App\Models\Permission',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->_models as $model) {
            if (!class_exists($model)) {
                throw new Exception('Configuration seed failed. Model does not exists.');
            }

            if (!defined($model.'::CONFIGURATION_DATA')) {
                throw new Exception('Configuration seed failed. Data does not exists.');
            }

            foreach ($model::CONFIGURATION_DATA as $row) {
                $record = $this->_getRecord($model, $row['id']);
                foreach ($row as $key => $value) {
                    $this->_upsertRecord($record, $row);
                }
            }

        }
    }

    /**
     * _fetchRecord - fetches a record if it exists, otherwise instantiates a new model
     *
     * @param string  $model - the model
     * @param integer $id    - the model ID
     *
     * @return object - model instantiation
     */
    private function _getRecord ($model, $id)
    {
        if ($this->_isSoftDeletable($model)) {
            $record = $model::withTrashed()->find($id);
        } else {
            $record = $model::find($id);
        }
        return $record ? $record : new $model;
    }

    /**
     * _upsertRecord - upsert a database record
     *
     * @param object $record - the record
     * @param array  $row    - the row of update data
     *
     * @return object
     */
    private function _upsertRecord ($record, $row)
    {
        foreach ($row as $key => $value) {
            if ($key === 'deleted_at' && $this->_isSoftDeletable($record)) {
                if ($record->trashed() && !$value) {
                    $record->restore();
                } else if (!$record->trashed() && $value) {
                    $record->delete();
                }
            } else {
                $record->$key = $value;
            }
        }
        return $record->save();
    }

    /**
     * _isSoftDeletable - Determines if a model is soft-deletable
     *
     * @param string $model - the model in question
     *
     * @return boolean
     */
    private function _isSoftDeletable ($model)
    {
        $uses = array_merge(class_uses($model), class_uses(get_parent_class($model)));
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', $uses);
    }
}
