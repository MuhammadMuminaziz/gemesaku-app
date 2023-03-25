<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        return view('user.show', [
            'user'      => User::whereUsername($username)->first(),
            'schools'   => School::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $request->id,
            'photo'     => $request->file('photo') != null ? "image|mimes:jpg,png,jpeg,gif,svg|max:2048" : '',
            'password'  => $request->password != null ? ['required', 'confirmed', Rules\Password::defaults()] : '',
        ]);

        // User
        $user = User::find($request->id);

        if ($request->password != null) {
            $data = [
                'school_id' => $user->school_id,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
            ];
        }else{
            $data = [
                'school_id' => $user->school_id,
                'name'      => $request->name,
                'email'     => $request->email,
            ];
        }
        
        $photo = $request->file('photo');
        if($photo){
            if($user->image != null){
                unlink('file_upload/user/' . $user->image);
            }
            $data['image'] = time() . "." . $photo->getClientOriginalExtension();
            $photo->move('file_upload/user', $data['image']);
        }

        User::find($request->id)->update($data);
        return back()->with('success', 'Profile berhasil diedit..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
