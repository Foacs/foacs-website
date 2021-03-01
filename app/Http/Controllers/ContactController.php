<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\ContactSupport;
use App\Mail\Contact;
use App\Models\Project;


class ContactController extends Controller
{
    /**
     * Sends email to contact support mail register for the project.
     * If the project is unknown or no mail are set use contact@foacs.ovh.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function contactSupport(Request $request, string $app_code) {
    
        // Check if token has the ability
        if (!Auth::user()->tokenCan('contact:issue')) {
            return response([
                "status"=>403, 
                "error"=>"Forbidden", 
                "message"=>"This token is unauthorize to perform this action"
            ], 403)->header('Content-Type', 'application/json');
        }

        // Check if a logs is provided.
        if (!$request->hasFile('logs') || !$request->logs->isValid()) {
            return response([
                "status"=>400, 
                "error"=>"Bad Request", 
                "message"=>"Logs is missing or upload failed."
            ], 400)->header('Content-Type', 'application/json');
        }
        try {
            $project = Project::where('code', $app_code)->first();
            
            $recipient = !is_null($project) ? $project->support_mail:'contact@foacs.ovh';
            $projectName = !is_null($project) ? $project->name:$app_code;

            Mail::to($recipient)
            ->send(new ContactSupport($request->logs, $projectName, json_decode($request->details ?? '{}'), $request->replyTo));
    
            return response([
                "status"=>204, 
                "success"=>"No Content", 
                "message"=>"The mail is sending."
            ], 204)->header('Content-Type', 'application/json');
        } catch(exception $e) {
            return response([
                "status"=>500, 
                "error"=>"Internal Server Error"
            ], 500)->header('Content-Type', 'application/json');
        }
    }

    public function contact(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'message'=>'required',
            'name' => 'required'
        ]);

        Mail::to('contact@foacs.ovh')
            ->send(new Contact($request->input('email'), $request->input('name'), $request->input('message')));
            session()->flash('success-title', 'Email envoyé');
            session()->flash('success', 'Votre message a été envoyé et sera lu rapidement.');
        return back();
    }
}
