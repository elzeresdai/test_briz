<?php

namespace App\Http\Controllers;

use App\Http\Requests\DellUserRequest;
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
        return view('index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserPhoneRequest $request
     * @return string
     */
    public function store(UserPhoneRequest $request)
    {
        $user = User::create(['first_name'=> $request->first_name,
            'last_name'=> $request->last_name]);
        if($request->has('phone')){
            foreach($request->phone as $phone) {
                UserPhone::create(['user_id' => $user->id,
                    'phone'=>$phone]);
                }
        }
        return 'ok';
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
        return view('axios.load_to_modal', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserPhoneRequest $request
     * @return string
     */
    public function update(UserPhoneRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        foreach ($request->all() as $key => $info) {
            if (isset($user->$key)) {
                $user->update([$key => $info]);
            }
        }
        if ($request->has('phone')) {
            foreach ($request->phone as $k => $phone) {
                UserPhone::findOrFail($k)->update(['phone' => $phone]);
            }
        }
        if ($request->has('new_phone')) {
            foreach ($request->new_phone as $new) {
                UserPhone::create(['user_id' => $request->user_id,
                    'phone' => $new]);
            }
        }
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $user_id
     * @return string
     */
    public function destroy($user_id)
    {
        try {
            User::findOrFail($user_id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return 'ok';

    }
}
