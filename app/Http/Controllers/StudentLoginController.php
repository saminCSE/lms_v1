<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailVerification;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class StudentLoginController extends Controller
{
    //
    public function Login()
    {
        return View('student.login');
    }

    public function studentLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password, 'email_verified'=>1])) {

            return redirect('/');
        } else {
            Session::flash('error-msg', 'Invalid email or password');
            return redirect()->back();
        }
    }
    public function showRegistrationForm()
    {
        return view('student.register');
    }

    public function showEmailVerificationForm()
    {
        return view('student.emailVerify');
    }



    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'StudentName' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'BirthDate' => 'required|date',
            'PhoneNo' => 'required|string|max:20',
        ]);

        // Generate a random verification code
        $verificationCode = rand(100000, 999999);

        // Create a new user
        $user = Student::create([
            'StudentName' => $request->input('StudentName'),
            'Email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'BirthDate' => $request->input('BirthDate'),
            'PhoneNo' => $request->input('PhoneNo'),
            'email_verification_code' => $verificationCode,
        ]);

        // Send verification email
        Mail::to($user->Email)->send(new EmailVerification($verificationCode));

        // Redirect to a page for email verification
        return redirect()->route('verification.show')->with('email', $user->Email);
    }
    public function verifyEmail(Request $request)
    {

        $request->validate([
            'verificationCode' => 'required|string',
        ]);

        $user = DB::table('students')
            ->where('email_verification_code', $request->input('verificationCode'))
            ->first();

        if ($user) {
        DB::table('students')
                ->where('id', $user->id)
                ->update(['email_verified' => true]);
            return redirect()->route('student.login')->with(Session::flash('error-msg','Registration Successful'));
        } else {
            return redirect()->back()->with('error', 'Invalid verification code');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect('/login/student');
    }
}
