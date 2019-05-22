<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deleted = count(User::onlyTrashed()->get());
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('backend.users.index', compact('users','deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => ['required','min:4','max:50'],
            'email'                 => ['required','email','unique:users'],
            'avatar'                => ['image','mimes:jpeg,png,jpg,gif,svg','max:512'],
            'profile_cover'         => ['image','mimes:jpeg,png,jpg,gif,svg','max:512'],
            'password'              => ['required','confirmed','string','min:6','max:25'],
            'password_confirmation' => ['required','string','min:6','max:25'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'active' => $request->active
        ]);

        if ($request->has('avatar')) {
            $user->avatar = $request->avatar->hashName();
            $request->file('avatar')->store('public/users/avatars');
            $user->save();
        }

        if ($request->has('profile_cover')) {
            $user->profile_cover = $request->profile_cover->hashName();
            $request->file('profile_cover')->store('public/users/covers');
            $user->save();
        }

        return redirect()->route('backend.users.index')->with('success', __('User was created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'              => ['required', 'string', 'max:50'],
            'email'             => ['required', 'string', 'unique:users,email,'.$user->id],
            'avatar'            => ['image','mimes:jpeg,png,jpg,gif,svg','max:512'],
            'profile_cover'     => ['image','mimes:jpeg,png,jpg,gif,svg','max:512']
        ]);

        if (isset($request->password)) {
            $request->validate([
                'password'  => ['required','confirmed','string','min:6','max:25'],
                'password_confirmation'  => ['required','string','min:6','max:25']
            ]);
            $user->password = bcrypt($request->password);
            $user->save();
        }

        if ($request->has('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/users/avatars/'.$user->avatar);
            }
            $request->avatar->store('public/users/avatars');
            $user->avatar = $request->avatar->hashName();
            $user->save();
        }

        if ($request->has('profile_cover')) {
            if ($user->profile_cover) {
                Storage::delete('public/users/covers/'.$user->profile_cover);
            }
            $request->profile_cover->store('public/users/covers');
            $user->profile_cover = $request->profile_cover->hashName();
            $user->save();
        }

        $user->update($request->only(['name','user','email','active']));

        return redirect()->route('backend.users.index')->with('success', __('User was updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id != auth()->user()->id) {
            $user->active = false;
            $user->save();
            $user->delete();
            return redirect()->route('backend.users.index')->with('success', __('User was deleted successfully'));
        } else {
            return redirect()->back()->with('warning', __('You cannot delete yourself'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted()
    {
        $deleted = User::onlyTrashed()->get();
        return view('backend.users.deleted', compact('deleted'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        $user->active = true;
        $user->save();
        if (count(User::onlyTrashed()->get()) === 0) {
            return redirect()->route('backend.users.index')->with('success', __('User was restored successfully'));
        }
        return redirect()->route('backend.users.deleted')->with('success', __('User was restored successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->id != auth()->user()->id) {
            $user->forceDelete();
            if (count(User::onlyTrashed()->get()) === 0) {
                return redirect()->route('backend.users.index')->with('success', __('User was deleted permanently'));
            }
            return redirect()->route('backend.users.deleted')->with('success', __('User was deleted permanently'));
        } else {
            return redirect()->back()->with('warning', __('You cannot delete yourself'));
        }
    }
}
