<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users, 'active' => 'users']);
    }

    public function profile(int $id) {
        $is_connected = Auth::id() === $id;
        
        $connected_user = Auth::user();
        
        $user = User::find($id);
        
        return view('user.profile', [
            'user' => $user, 
            'connected_user' => $connected_user,
            'active' => 'users',
            'mode' => 'show'
            ]);
    }

    public function edit(Request $request, User $user)
    {
        
        return view('user.profile', [
            'user' => $user, 
            'connected_user' => Auth::user(),
            'active' => 'users',
            'mode' => 'edit'
            ]);
    }

    public function save(Request $request, User $user)
    {
        $request->validate([
            'phone_number' => 'regex:/^[0-9\-]*$/'
        ]);

        $user->fill($request->all())->save();
        return redirect()->route('profile.show', $user->id)->with('success', 'Profile modifié');
    }

    public function delete(Request $request, User $user) 
    {
        $user->delete();

        session()->flash('success', 'Utilisateur supprimé.');
        session()->flash('success-title', 'L\'utilisateur a été supprimé');
        return back();
    }

}