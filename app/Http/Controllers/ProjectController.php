<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
	public function index()
	{
		return redirect()->route('projects.show', Project::first());
	}

	public function show(Request $request, Project $project) {
		
		if (null !== $request->user() && $request->user()->can('seeTrashed', Project::class)) {
			$projects = Project::withTrashed()->get();
		} else {
			$projects = Project::all();
		}

		return view('project.show', [
			'projects' => $projects,
			'current' => $project,
			'users' => User::all(),
			'active' => 'projects', 
			'prj' => $project->name
			]);
	} 

	public function edit(Request $request, Project $project)
	{
		return view('project.edit', [
			'project' => $project,
			'active' => 'projects',
		]);
	}


	public function editStore(Request $request, Project $project)
	{
		$project->fill($request->all())->save();
		return redirect()->route('projects.show', $project->id)->with('success', 'Projet modifié.');
	}

	public function delete(Request $request, Project $project)
	{
		$project->delete();
		return redirect()->route('projects.show', $project)->with('success-title', 'Projet supprimé.')->with('success', 'Le projet n\'est plus visible publiquement.');
	}

	public function create()
	{
		return view('project.create', [
			'active' => 'projects',
		]);
	}

	public function createStore(Request $request)
	{
		$request->validate([
			'name' => 'required|min:4',
			'code' => 'required|alpha_dash|unique:projects,code',
			'description' => 'required',
			'email_support' => 'email:rfc'
		]);

		$project = new Project();
		$project->fill($request->except(['_token']))->save();

		return redirect()->route('projects.show', $project)->with('success', 'Projet créé.');
	}

	public function restore(Request $request, Project $project)
	{
		$project->restore();
		return redirect()->route('projects.show', $project)->with('success-title', 'Projet restauré.')->with('success', 'Le projet est désormais visible publiquement.');
	}

	public function addContributor(Request $request, Project $project) 
	{
		var_dump($project->users()->getResults()->toArray());
		$validator = Validator::make($request->all(), [
			'user' => [
				'required',
				'exists:users,id',
				Rule::notIn(
					array_map(function ($val) { return $val['id']; }, $project->users()->getResults()->toArray())
				)
				],
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}
		$user = User::find($request->input('user'));
		$project->users()->attach($user, ['role_description' => $request->input('role_description')]);

		return redirect()->route('projects.show', $project)->with('success-title', 'Contributeur ajouté.')->with('success', 'Le contributeur a été ajouté.');
	}

	public function removeContributor(Request $request, Project $project, User $user) 
	{
		$project->users()->detach($user);
		return back()->with('success', 'Contributeur retiré du projet.');
	}

}