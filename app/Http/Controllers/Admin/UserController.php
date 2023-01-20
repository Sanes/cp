<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Spatie\Permission\Models\Role;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->get('s')) {
        $users = Search::new()
            ->add(User::with(['profile', 'roles']), ['name', 'email', 'profile.phone', 'profile.about', 'profile.note', 'roles.name'])
            ->beginWithWildcard()
            ->paginate(20)
            ->search($request->get('s'));   
        }
        else
        {
            $users = User::paginate(20);
        }

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',],
            'phone' => ['nullable','numeric','regex:/^.{11,20}$/i', 'unique:profiles,phone'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $profile = Profile::where('user_id', $user->id)->firstOrFail();
        $profile->phone = $request->phone;
        $profile->about = $request->about;
        $profile->note = $request->note;
        $profile->update();
        $user->assignRole($request->role);

        return redirect(route('admin.users.show', $user))->with('user-created', '');
    }

    public function show(User $user)
    {
        return view('admin.users.show', $user, ['user' => $user]);
    }

    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'numeric','regex:/^.{11,20}$/i', 'unique:profiles,phone,'.$user->id],
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->update();
        $profile = Profile::where('user_id', $user->id)->firstOrFail();
        $profile->phone = $request->phone;
        $profile->about = $request->about;
        $profile->note = $request->note;
        $profile->update();
        if ($user->id !== 1 || $user->id !== auth()->user()->id) {
            if ($request->role) {
                $user->syncRoles($request->role);
            }
            else
            {
                $user->syncRoles();
            }
        }

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
