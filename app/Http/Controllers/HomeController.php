<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // auth()->user()->givePermissionTo('write posts');
        $role=Role::find(3);
        
        auth()->user()->assignRole($role);

        $users = User::with('permissions','roles')->get();
        return view('home', \compact('users'));
    }
}
