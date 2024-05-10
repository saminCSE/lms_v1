<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeacherLoginController extends Controller
{
    //
    public function Login()
    {
        return View('teacher.login');
    }

    public function teacherLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect('/TeacherDashboard');
        } else {
            Session::flash('error-msg', 'Invalid email or password');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        return redirect('/login/teacher');
    }
}