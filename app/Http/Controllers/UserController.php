<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
    }






    public function __invoke()
    {
        return 'User Data';
    }

    public function create(){
        return view('backend.create');
    }

    public function store(Request $request){
        $code=rand(1111,9999);
        $user= new User;

        $user->phone_number->request->phone_number;
        $user->code->$code;
        $user->save();

        $nexmo = app('Nexmo\Client');

$nexmo->message()->send([
    'to'   => '+20'.(int) $request->phone_number,
    'from' => '16105552344',
    'text' => 'Using the instance to send a message.'.$code
]);
    return redirect('/verify');

    }

    public function getverify(){
        return view('auth.verify-mob');
    }

    public function postverify(Request $request){
        $check =User::where('code', $request->code)->first;
        if($check){
            $check->code="";
            $check->save();
            return redirect('/');
        }else{
            return back()->withMessage('mahmugd');
        }
    }
}
