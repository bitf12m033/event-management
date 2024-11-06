<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Users';
        $breadcrumbs = [
            ['title' => 'Users', 'url' => null]
        ];
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users', 'pageTitle', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create User';
        $breadcrumbs = [
            ['title' => 'Users', 'url' => route('admin.users.index')],
            ['title' => 'Create User', 'url' => null]
        ];
        return view('admin.users.create', compact('pageTitle', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            // Add any other required fields for user registration
        ]);
    
        $data = $request->all();
        $data['password'] = Hash::make('password');
    
        User::create($data);
    
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'View User';
        $breadcrumbs = [
            ['title' => 'Users', 'url' => route('admin.users.index')],
            ['title' => 'View User', 'url' => null]
        ];
        return view('admin.users.show', compact('user', 'pageTitle', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $pageTitle = 'Edit User';
        $breadcrumbs = [
            ['title' => 'Users', 'url' => route('admin.users.index')],
            ['title' => 'Edit User', 'url' => null]
        ];
        return view('admin.users.edit', compact('user', 'pageTitle', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|unique:users,email,' . $user->id,
            // Add any other required fields for user update
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
