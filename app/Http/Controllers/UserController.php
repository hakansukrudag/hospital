<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required|numeric|max:200',
            'image_path' => 'required|max:32'
        ]);

        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = $request->input('password');
        $newUser->age = $request->input('age');
        $newUser->image_path = $request->input('image_path');
        $newUser->save();
        return response()->json(['success => true']);
    }
}
