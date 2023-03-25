<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'schools'   => School::orderBy('name', 'asc')->get(),
            'users'     => User::orderBy('name', 'asc')->where('role_id', 2)->get()
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
    public function show(User $user, Request $request, $username)
    {
        return view('user.show', [
            'user'      => User::whereUsername($username)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
            'password'  => $request->password != null ? ['required', 'confirmed', Rules\Password::defaults()] : '',
        ]);

        if ($request->password != null) {
            $data = [
                'school_id' => $request->school_id,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
            ];
        } else {
            $data = [
                'school_id' => $request->school_id,
                'name'      => $request->name,
                'email'     => $request->email,
            ];
        }

        User::find($request->id)->update($data);
        return response()->json([
            'message'   => "Pembimbing berhasil diedit.."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $username)
    {
        $user = User::whereUsername($username)->first();
        $user->delete();
        return back();
    }

    public function modal(Request $request)
    {
        $school = School::orderBy('name', 'asc')->get();
        if ($request->modalType == 'create') {
            return view('user.modal-add-pembimbing', [
                'schools'       => $school
            ]);
        } elseif ($request->modalType == 'edit') {
            return view('user.modal-edit-pembimbing', [
                'pembimbing'    => User::whereUsername($request->username)->first(),
                'schools'       => $school
            ]);
        } elseif ($request->modalType == 'lihat') {
            return view('user.modal-lihat-pembimbing', [
                'pembimbing'    => User::whereUsername($request->username)->first(),
            ]);
        } else {
            return "<div class='text-danger'>Maaf terjadi kesalahan...</div>";
        }
    }
}
