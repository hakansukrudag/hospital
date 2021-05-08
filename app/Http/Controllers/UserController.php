<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Helper;

    public function index()
    {
        return view('user_dashboard');
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

}
