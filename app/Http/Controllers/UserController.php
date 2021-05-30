<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Helper;

    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $dob = $this->reverseBirthday($user->age);
        }

        $contactDetails = null;
        if ($user) {
            $contactDetails = $user->contactDetails ?? null;
        }

        $medicineDetails = null;
        if ($user) {
            $medicineDetails = $user->medicineDetails ?? null;
        }

        $appointments = $user->appointmentDetails;

        return view('user_dashboard',
            compact('user',
                    'contactDetails',
                    'appointments',
                    'medicineDetails'));
    }

    public function showUserProfile()
    {
        $user = Auth::user();
        if ($user) {
            $dob = $this->reverseBirthday($user->age);
        }
        return view('pages.userDashboard.profile', compact('user', 'dob'));
    }

    public function storeUserProfile(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $image_path = $request->input('image_path');
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|date|date_format:Y-m-d|before:5 years ago|after:120 years ago',
            'image_path' => 'sometimes|max:32'
        ]);

        if ($user) {
           $existingUser = User::find($user->id);
        }

        $existingUser->name = $name;
        $existingUser->age = $this->ageCalculator($age);
        $existingUser->image_path = $image_path;
        $existingUser->save();
        return response()
            ->redirectTo(route('showUserProfile'))
            ->with('success', 'The profile has been saved successfully.');
    }

    public function showContactDetails(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $contactDetails = $user->contactDetails ?? null;
        }

        /**
         * If user doesn't have contact details, then create it and store authenticated user's name and email address
         *  into the contact table. After obtaining the contact id, store it into authenticated user's contact fk_contact_id
         */
        if (empty($contactDetails))
        {
            $newContact = new Contact();
            $newContact->name  = $user->name;
            $newContact->email  = $user->email;
            $newContact->save();
            $user->fk_contact_id = $newContact->id;
            $user->save();
            $contactDetails = $newContact;
        }

       return view('pages.userDashboard.contactDetails', compact('contactDetails'));
    }

    public function storeContactDetails(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $id = $request->input('id');

        $this->validate($request, [
            'name' => 'required',
            'address' => 'sometimes|max:255',
            'email' => 'required|max:32',
            'telephone' => ['sometimes', 'regex:/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/'],
        ]);

        if (!empty($id)) {
            $contact = Contact::find($id);
            $contact->name = $name;
            $contact->address = $address;
            $contact->telephone = $telephone;
            $contact->email = $email;
            $contact->save();
        }

        return response()
            ->redirectTo(route('showContactDetails'))
            ->with('success', 'The contact detail has been saved successfully.');
    }
}
