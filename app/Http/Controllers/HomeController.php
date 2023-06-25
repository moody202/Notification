<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SMSNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function send()
    {
    	$user = User::first();

        $project = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'This is the project assigned to you.',
            'thanks' => 'Thank you this is from codeanddeploy.com',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 57
        ];

        Notification::send($user, new SMSNotification($project));

        dd('Notification sent!');
    }
}
