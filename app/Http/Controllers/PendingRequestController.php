<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PendingRequestController extends Controller
{
     public function index()
    {
        
        // dd(User::all());
        $count = User::count();
        return view('users.pendingrequest')
                ->with([
                    'users' => User::all()
                ]);
    }

    public function confirmrequest(){
      
    }
}
