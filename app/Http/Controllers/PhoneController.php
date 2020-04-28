<?php

namespace App\Http\Controllers;

use App\UserPhone;
use Illuminate\Http\Request;
use MongoDB\Driver\Exception\Exception;

class PhoneController extends Controller
{
    public function delIssetNumber(Request $request)
    {
        try {
            UserPhone::findOrFail($request->phone_id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return 'ok';
    }
}
