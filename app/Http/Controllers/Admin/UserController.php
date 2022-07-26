<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['name', 'email', 'profile.phone', 'profile.about', 'profile.note', 'roles.name'])
            ->allowedIncludes(['profile', 'roles'])
            ->orderBy('name')
            ->paginate(200);
            // dd($users);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();
        // dd($roles);
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $profile = Profile::where('user_id', $user->id)->firstOrFail();
        $profile->phone = $request->phone;
        $profile->update();
        $user->assignRole($request->role);

        return redirect(route('admin.users.show', $user))->with('user-created', '');
    }

    public function show(User $user)
    {
        // dd($user);
        return view('admin.users.show', $user, ['user' => $user]);
    }

    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->update();
        $profile = Profile::where('user_id', $user->id)->firstOrFail();
        $profile->phone = $request->phone;
        $profile->update();
        $user->assignRole($request->role);

        return redirect(route('admin.users.show', $user))->with('user-updated', '');
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        if ($user->id === 1 || $user->id === auth()->user()->id) {
            return abort('403');
        }
        $user->delete();
        return redirect(route('admin.users.index'))->with('user-destroyed', '');
    }    
    
    public function impersonate(User $user) 
    {
        auth()->user()->impersonate($user);

        return redirect()->route('welcome');
    }

    public function leaveImpersonate() 
    {
        auth()->user()->leaveImpersonation();

        return redirect()->route('welcome'); 
    }
}
