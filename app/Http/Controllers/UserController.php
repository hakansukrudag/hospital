<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('userAuthCheck');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'age' => 'required|date|date_format:Y-m-d|before:5 years ago|after:120 years ago',
            'image_path' => 'required|max:32'
        ]);

        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = bcrypt($request->input('password'));
        $newUser->age = $this->ageCalculator($request->input('age'));
        $newUser->image_path = $request->input('image_path');
        $newUser->admin = ($request->input('isAdmin') === 'on') ? 1 : 0;
        $newUser->save();
        return response()->json(['success => true']);
    }

    private function ageCalculator(string $date): int
    {
        $date = new DateTime($date);
        $now = new DateTime();
        return $now->diff($date)->y;
    }

    public function delete(Request $request): JsonResponse
    {
        User::find($request->id)->delete();
        return response()->json(['success' => true]);
    }

    public function edit(Request $request): JsonResponse
    {
        User::find($request->id)->edit();
        return response()->json(['success' => true]);
    }
}
