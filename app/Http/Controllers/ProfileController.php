<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller

{

    public function index(): View
    {
        $users = User::where('role', 1)->get();
        return view('admin.users_list', ['users' => $users]);
    }

    public function index_referees(): View
    {
        $referees = User::where('role', 2)->get();
        return view('admin.referees', ['referees' => $referees]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'group' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->group = $request->group;
        $user->role = $request->role;

        $user->save();

        return redirect()->back()->with('success', 'Successfully added');
    }


    public function edit($id): View
    {
        $user = User::where('id', $id)->first();
        return view('admin.users_update', compact('user'));
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
            $request->validate([
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed',
                'group' => 'required',
            ]);

        $user['password'] = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->group = $request->group;
        $user->save();

        if($user->role == 1){
            return redirect()->route('users_list.index')->with('success', 'Successful updated');
        }else{
            return redirect()->route('referees.index_referees')->with('success', 'Successful updated');
        }

    }

    /**
     * Delete the user's account.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
