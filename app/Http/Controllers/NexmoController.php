<?php

namespace App\Http\Controllers;

use Nexmo;
use Illuminate\Http\Request;
use Vonage\Verify\Verification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NexmoController extends Controller
{
    public function show() {
        return view('nexmo');
    }

    public function verify(Request $request) {
         $this->validate($request, [
             'code' => 'size:4'
         ]);

         $request_id = session('nexmo_request_id');
         $verification = new \Nexmo\Verify\Verification($request_id);

         Nexmo::verify()->check($verification, $request->code);

         $date = date_create();
         DB::table('users')->where('id', Auth::id())->update(['phone_verified_at' => date_format($date, 'Y-m-d H:i:s')]);

         return redirect('/home');
    }
}
