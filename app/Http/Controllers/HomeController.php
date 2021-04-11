<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Department;
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
        $this->middleware('userAuthCheck');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $appointments = Appointment::all();
        return view('home', compact('users', 'appointments'));
    }

    public function appointmentDelete(Request $request)
    {
        $id = $request->input('id');

        Appointment::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
