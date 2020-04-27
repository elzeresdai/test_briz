<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPhoneRequest;
use App\User;
use App\UserPhone;
use Illuminate\Http\Request;

class UserPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::with('phone')->get();
        return view('index',$data);
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
     * @param  \App\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function show(UserPhone $userPhone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($user_id)
    {
        $data['user'] = User::find($user_id);
        return view('axios.load_to_modal',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserPhoneRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserPhoneRequest $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPhone $userPhone)
    {
        //
    }
}
