<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Department;
use App\Models\Procedure;
use App\Models\User;
use Carbon\Carbon;
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
        $departments = Department::all();
        $procedures = Procedure::all();
        $users = User::where('admin', false)->get();
        return view('home', compact('users', 'appointments', 'departments', 'procedures', 'users'));
    }

    public function appointmentDelete(Request $request)
    {
        $id = $request->input('id');

        Appointment::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function appointmentAdd(Request $request)
    {
        $this->validate($request, [
            'appointmentUser' => 'required',
            'appointmentDatetime' => 'required',
            'appointmentDepartment' => 'required',
            'appointmentProcedure' => 'required'
        ]);
        $newAppointmentRecord = new Appointment();
        $newAppointmentRecord->fk_user_id = $request->input('appointmentUser');
        $newAppointmentRecord->date_time = Carbon::parse($request->input('date_time'))->format('Y-m-d H:i:s');
        $newAppointmentRecord->fk_department_id = $request->input('appointmentDepartment');
        $newAppointmentRecord->fk_procedure_id = $request->input('appointmentProcedure');
        $newAppointmentRecord->save();
        return response()->json(['success' => true]);
    }
}
