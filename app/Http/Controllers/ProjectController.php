<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
	public function index()
	{
		$id = Project::first()->id;
		return redirect()->route('projects.show', ['id' => $id]);
	}

	public function show(int $id) {
		$projects = Project::all();
		$current = Project::find($id);
		return view('projects', [
			'projects' => $projects,
			'current' => $current,
			'active' => 'projects', 
			'prj' => $current->name]);
	} 


}