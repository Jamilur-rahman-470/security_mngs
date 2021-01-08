<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Perticipator;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', auth()->id())->first();
        $profile = null;
        if ($user->type === 'employee') {
            $profile = Employee::where('reg_id', auth()->id())->first();
        } elseif ($user->type === 'participator') {
            $profile = Perticipator::where('reg_id', auth()->id())->first();
        } else {
            $profile = Client::where('reg_id', auth()->id())->first();
        }
        return view('home', ['user' => $user, 'profile' => $profile]);
    }
}
