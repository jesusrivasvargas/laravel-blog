<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('check-profile')->except('create', 'store');
        $this->middleware('auth');
    }

    public function avatarStore(Request $request)
    {
        $user = $request->user();
        $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();
        return view('profiles.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = request()->user();
        return view('profiles.create', compact('user'));
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
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'passport' => 'required|numeric',
            'cellphone' => 'required|numeric',
            'subcategory_id' => 'required|integer',
            'username' => 'required|string|unique:profiles'
        ]);
        $user = request()->user();
        $profile = new Profile;
        $profile->fill($request->all());
        $profile->username = '@' . strtolower($profile->username);
        $user->profile()->save($profile);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $user = request()->user();
        if ($profile->user->id != $user->id) {
            return redirect()->route('home');
        }

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'passport' => 'required|numeric',
            'cellphone' => 'required|numeric',
            'subcategory_id' => 'required|integer',
        ]);
        $profile->update($request->all());
        $profile->user->update($request->all());

        return back()->with('status', 'Perfil de usuario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        return redirect()->route('home');
    }
}
