<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function adminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.admin-page');
        }
        return view('login-page.admin-login');
    }
    public function teacherLogin()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.teacher-page');
        }
        return view('login-page.teacher-login');
    }
    public function contactUs()
    {
        return view('login-page.contact-us');
    }

    public function storeAdmin(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'username' => 'required|string',
                'password' => 'required|string'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'error' => $validate->errors(),
                    'code' => 422
                ]);
            }
            // $admin = Logins::where('username', $request->username)->first();
            // // if ($admin && Hash::check($request->password, $admin->password)) {

            // //     // session(['admin_logged_in' => true]);
            // //     Auth::login($admin);
            // //     return response()->json([
            // //         'redirect' => route('admin.admin-page'),
            // //         'code' => 200
            // //     ]);
            // // }
            // if (!$admin) {
            //     return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
            // }

            // if (!Hash::check($request->password, $admin->password)) {
            //     return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
            // }

            // // Check if user has admin role
            // if ($admin->role !== 'admin') {
            //     return response()->json(['error' => 'Unauthorized access', 'code' => 401]);
            // }

            // // Login the admin - remove the named parameter
            // Auth::login($admin);

            // return response()->json([
            //     'redirect' => route('admin.admin-page'),
            //     'code' => 200
            // ]);
            //return response()->json(['error' => 'Password Wrong', 'code' => 401]);   
            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if (Auth::guard('admin')->attempt($credentials)) {
                return response()->json([
                    'redirect' => route('admin.admin-page'),
                    'code' => 200
                ]);
            }

            return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json(['error' => 'Server error', 'code' => 500]);
        }
    }
    public function storeTeacher(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string'
        ], [
            'name.required' => 'Teacher User Name is required',
            'password.required' => 'Teacher Password is required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        // $teacher = Teacher::where('name', $request->name)->firstOrFail();
        // // if ($teacher && Hash::check($request->password, $teacher->password)) {
        // //     // session([
        // //     //     'teacher_logged_in' => true,
        // //     //     'teacher_id' => $teacher->id
        // //     // ]);
        // //     Auth::login($teacher);
        // //     return response()->json([
        // //         'status' => 200,
        // //         'redirect' => route('teacher.teacher-page')
        // //     ]);
        // // }
        //  if (!$teacher) {
        //         return response()->json(['error' => 'Teacher not found', 'code' => 401]);
        //     }

        //     if (!Hash::check($request->password, $teacher->password)) {
        //         return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
        //     }

        //     // Make sure the user has teacher role
        //     if ($teacher->role !== 'teacher') {
        //         return response()->json(['error' => 'Unauthorized access', 'code' => 401]);
        //     }

        //     // Login the teacher
        //     Auth::login($teacher);

        //     return response()->json([
        //         'status' => 200,
        //         'redirect' => route('teacher.teacher-page')
        //     ]);
        // return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
            'role' => 'teacher'  
        ];

        if (Auth::guard('teacher')->attempt($credentials)) {
            return response()->json([
                'status' => 200,
                'redirect' => route('teacher.teacher-page')
            ]);
        }

        return response()->json(['error' => 'Invalid credentials', 'code' => 401]);
    }
}
