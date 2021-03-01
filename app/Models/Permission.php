<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory;

    const CONFIGURATION_DATA = [
        [
            'id' => 1,
            'name' => 'See trashed projects',
            'slug' => 'see-trashed-projects'
        ],
        [
            'id' => 2,
            'name' => 'Create projects',
            'slug' => 'create-projects'
        ],
        [
            'id' => 3,
            'name' => 'Update projects',
            'slug' => 'update-projects'
        ],
        [
            'id' => 4,
            'name' => 'Delete projects',
            'slug' => 'delete-projects'
        ],
        [
            'id' => 5,
            'name' => 'Restore projects',
            'slug' => 'restore-projects'
        ],
        [
            'id' => 6,
            'name' => 'Force delete projects',
            'slug' => 'force-delete-projects'
        ],
        [
            'id' => 7,
            'name' => 'Add contributor projects',
            'slug' => 'add-contributor-projects'
        ],
        [
            'id' => 8,
            'name' => 'Remove contributor projects',
            'slug' => 'remove-contributor-projects'
        ],
        [
            'id' => 9,
            'name' => 'Manage API token',
            'slug' => 'manage-api-token'
        ],
        [
            'id' => 10,
            'name' => 'Manage other API token',
            'slug' => 'manage-other-api-token'
        ],
        [
            'id' => 11,
            'name' => 'Update other profile',
            'slug' => 'update-other-profile'
        ],
        [
            'id' => 12,
            'name' => 'See other phone number',
            'slug' => 'see-other-phone'
        ],
        [
            'id' => 13,
            'name' => 'Delete profile',
            'slug' => 'delete-profile'
        ]
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
