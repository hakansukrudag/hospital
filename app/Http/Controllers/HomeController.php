<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Department;
use App\Models\Procedure;
use App\Models\Medicine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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
        $consultants = Consultant::all();
        $medicines = Medicine::all();
        $usersAppointment = User::where('admin', false)->get();
        return view('home', compact('users', 'appointments', 'departments', 'procedures', 'usersAppointment', 'consultants', 'medicines'));
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

    public function consultantDelete(Request $request)
    {
        $id = $request->input('id');

        Consultant::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function consultantAdd(Request $request)
    {
        $this->validate($request, [
            'consultantName' => 'required|max:255',
        ]);

        $newConsultantRecord = new Consultant();
        $newConsultantRecord->name = $request->input('consultantName');
        $newConsultantRecord->save();

        return response()->json(['success' => true]);
    }

    public function medicineDelete(Request $request)
    {
        $id = $request->input('id');

        Medicine::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function medicineAdd(Request $request)
    {
        $this->validate($request, [
            'medicineName' => 'required|max:255',
            'medicineDose' => 'required|max:255',
        ]);

        $newMedicineRecord = new Medicine();
        $newMedicineRecord->name = $request->input('medicineName');
        $newMedicineRecord->dose = $request->input('medicineDose');
        $newMedicineRecord->save();

        return response()->json(['success' => true]);
    }

    public function storeAppointmentChanges(Request $request)
    {
        $id = $request->input('appointmentEditId');
        $this->validate($request, [
            'appointmentEditUser' => 'required',
            'appointmentEditDatetime' => 'required',
            'appointmentEditDepartment' => 'required',
            'appointmentEditProcedure' => 'required',
        ]);

        $appointment =  Appointment::find($id);
        $appointment->fk_user_id = $request->input('appointmentEditUser');
        $appointment->date_time = Carbon::createFromFormat('d/m/Y H:i:s', $request->input('appointmentEditDatetime'))->format('Y-m-d H:i:s');
        $appointment->fk_department_id = $request->input('appointmentEditDepartment');
        $appointment->fk_procedure_id = $request->input('appointmentEditProcedure');
        $appointment->save();
        return response()->json(['success => true']);
    }

    public function appointmentShow(Request $request)
    {
        $appointment = Appointment::find($request->input('id'));
        return response()->json(
            [
                'appointment' => $appointment,
                'datetime' => $appointment->date_time->format('d/m/Y H:i:s')
            ]
        );
    }

    public function storeConsultantChanges(Request $request)
    {
        $id = $request->input('consultantEditId');
        $this->validate($request, [
            'consultantEditName' => 'required',

        ]);

        $consultant = Consultant::find($id);
        $consultant->name = $request->input('consultantEditName');

        $consultant->save();
        return response()->json(['success => true']);
    }

    public function consultantShow(Request $request)
    {
        $consultant = Consultant::find($request->input('id'));
        return response()->json(
            [
                'consultant' => $consultant,
            ]
        );
    }

    public function storeMedicineChanges(Request $request)
    {
        $id = $request->input('medicineEditId');
        $this->validate($request, [
            'medicineEditName' => 'required',
            'medicineEditDose' => 'required',
        ]);

        $medicine = Medicine::find($id);
        $medicine->name = $request->input('medicineEditName');
        $medicine->dose = $request->input('medicineEditDose');
        $medicine->save();
        return response()->json(['success => true']);
    }

    public function medicineShow(Request $request)
    {
        $medicine = Medicine::find($request->input('id'));
        return response()->json(
            [
                'medicine' => $medicine,
            ]
        );
    }

}
