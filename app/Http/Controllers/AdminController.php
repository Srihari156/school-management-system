<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Logins;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherAssignClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function admin()
    {
        $name = Logins::all();
        return view('admin-pages.admin-page', compact('name'));
    }
    public function adminStudentAdd()
    {
        $class = ClassModel::all();
        $student = Student::with('classModel')->get();
        return view('admin-pages.admin-student-add', compact('class', 'student'));
    }
    public function adminTeacherAdd()
    {
        $subject = Subject::all();
        $teacher = Teacher::all();
        return view('admin-pages.admin-teacher-add', compact('subject', 'teacher'));
    }
    public function adminSubjectAdd()
    {
        $subject = Subject::all();
        $teacher = Teacher::with('subject')->get();
        return view('admin-pages.admin-subject-add', compact('subject', 'teacher'));
    }
    public function adminAssignTeacher()
    {
        $subject = Subject::all();
        $teacher = Teacher::all();
        $class = ClassModel::all();
        $teacherAssign = TeacherAssignClass::with(['subject', 'teacher', 'classes'])->get();
        return view('admin-pages.admin-assign-teacher-class', compact('subject', 'teacher', 'class', 'teacherAssign'));
    }
    public function adminChangePassword()
    {
        return view('admin-pages.admin-change-password');
    }
    public function adminClassAdd()
    {
        $class = ClassModel::all();
        return view('admin-pages.admin-class-add', compact('class'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return response()->json([
            'message' => 'Logged out successfully',
            'redirect' => route('login.admin')
        ]);
    }

    public function storeClass(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'class_name' => 'required|string'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors(),
                'code' => 422
            ]);
        }
        $class = new ClassModel;
        $class->class_name = $request->input('class_name');
        $class->save();
        return response()->json([
            'status' => 200,
            'message' => 'Student Added Successfully.'
        ]);
    }

    public function updateClass(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'class_name' => 'required|string'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors(),
                'code' => 422
            ]);
        }
        $class = ClassModel::find($id);
        // if (!$class) {
        //     return response()->json([
        //         'error' => 'Class not found.',
        //         'code' => 404
        //     ]);
        // }
        $class->class_name = $request->input('class_name');
        $class->update();
        return response()->json([
            'status' => 200,
            'message' => 'Class Updated Successfully'
        ]);
    }
    public function deleteClass(Request $request, $id)
    {
        $class = ClassModel::find($id);
        if (!$class) {
            return response()->json([
                'code' => 404,
                'message' => 'Class not found'
            ]);
        }

        $class->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Class deleted successfully'
        ]);
    }
    public function storeStudent(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'nationality' => 'required|string',
            'father_occupation' => 'required|string',
            'mother_occupation' => 'required|string',
            'mobile_no' => 'required|string',
            'address' => 'required|string',
            'bloodgroup' => 'required|string',
            'class_id' => 'required|string'
        ], [
            'name.required' => 'The Student Name is required',
            'age.required' => 'The Student Age is required',
            'dob.required' => 'The Student Date Of Birth is required',
            'father_name.required' => 'The Father Name is required',
            'mother_name.required' => 'The Mother Name is required',
            'district.required' => 'The District is required',
            'city.required' => 'The City is required',
            'state.required' => 'The State is required',
            'nationality.required' => 'The nationality is required',
            'father_occupation.required' => 'The Father Occupation is required',
            'mother_occupation.required' => 'The Mother Occupation is required',
            'mobile_no.required' => 'The Mobile Number is required',
            'address.required' => 'The Address is required',
            'bloodgroup.required' => 'The Blood Group  is required',
            'class_id.required' => 'The Class Name is required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $student = new Student;
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->dob = $request->input('dob');
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->district = $request->input('district');
        $student->city = $request->input('city');
        $student->state = $request->input('state');
        $student->nationality = $request->input('nationality');
        $student->father_occupation = $request->input('father_occupation');
        $student->mother_occupation = $request->input('mother_occupation');
        $student->mobile_no = $request->input('mobile_no');
        $student->address = $request->input('address');
        $student->bloodgroup = $request->input('bloodgroup');
        $student->class_id = $request->input('class_id');
        $student->save();
        return response()->json([
            'status' => 200,
            'message' => 'Student Added Successfully.'
        ]);
    }
    public function updateStudent(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'nationality' => 'required|string',
            'father_occupation' => 'required|string',
            'mother_occupation' => 'required|string',
            'mobile_no' => 'required|string',
            'address' => 'required|string',
            'bloodgroup' => 'required|string',
            'class_id' => 'required|integer'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $student = Student::find($id);
        $student->update($request->only([
            'name',
            'age',
            'dob',
            'father_name',
            'mother_name',
            'district',
            'city',
            'state',
            'nationality',
            'father_occupation',
            'mother_occupation',
            'mobile_no',
            'address',
            'bloodgroup',
            'class_id'
        ]));
        return response()->json([
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ]);
    }
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ]);
    }
    public function storeSubject(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'subject' => 'required|string'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $subject = new Subject;
        $subject->subject = $request->input('subject');
        $subject->save();
        return response()->json([
            'status' => 200,
            'message' => 'subject Added Successfully'
        ]);
    }
    public function updateSubject(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            "subject" => "required|string"
        ]);

        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $subject = Subject::find($id);
        $subject->subject = $request->input('subject');
        $subject->update();
        return response()->json([
            'status' => 200,
            'message' => 'Subject Updated Successfully'
        ]);
    }
    public function deleteSubject(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return response()->json([
            "status" => 200,
            'message' => 'Deleted Subject Successfully'
        ]);
    }
    public function storeTeacher(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'degree' => 'required|string',
            'experience' => 'required|string',
            'subject_id' => 'required|string',
            'mobile_no' => 'required|string',
            'blood_group' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string|min:5'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $teacher = new Teacher;
        $teacher->name = $request->input('name');
        $teacher->age = $request->input('age');
        $teacher->dob = $request->input('dob');
        $teacher->father_name = $request->input('father_name');
        $teacher->mother_name = $request->input('mother_name');
        $teacher->degree = $request->input('degree');
        $teacher->experience = $request->input('experience');
        $teacher->subject_id = $request->input('subject_id');
        $teacher->mobile_no = $request->input('mobile_no');
        $teacher->blood_group = $request->input('blood_group');
        $teacher->address = $request->input('address');
        $teacher->password = Hash::make($request->input('password'));
        $teacher->save();
        return response()->json([
            'status' => 200,
            'message' => 'Teacher Created Successfully'
        ]);
    }
    public function updateteacher(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'degree' => 'required|string',
            'experience' => 'required|string',
            'subject_id' => 'required|string',
            'mobile_no' => 'required|string',
            'blood_group' => 'required|string',
            'address' => 'required|string'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $teacher = Teacher::find($id);
        // $teacher->name = $request->input('name');
        // $teacher->age = $request->input('age');
        // $teacher->dob = $request->input('dob');
        // $teacher->father_name = $request->input('father_name');
        // $teacher->mother_name = $request->input('mother_name');
        // $teacher->degree = $request->input('degree');
        // $teacher->experience = $request->input('experience');
        // $teacher->subject_id = $request->input('subject_id');
        // $teacher->mobile_no = $request->input('mobile_no');
        // $teacher->address = $request->input('address');
        // $teacher->blood_group = $request->input('blood_group');
        $teacher->update($request->only([
            'name',
            'age',
            'dob',
            'father_name',
            'mother_name',
            'degree',
            'experience',
            'subject_id',
            'mobile_no',
            'address',
            'blood_group'
        ]));
        return response()->json([
            'status' => 200,
            'message' => 'Teachers Updated Successfully'
        ]);
    }
    public function deleteTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted teachers Successfully'
        ]);
    }
    public function adminUpdatePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'admin_old_password' => 'required|string',
            'admin_new_password' => 'required|string|min:6',
            'admin_confirm_password' => 'required|string|same:admin_new_password'
        ], [
            'admin_old_password.required' => 'Old Password is required',
            'admin_new_password.required' => 'New Password is required',
            'admin_new_password.min' => 'New Password must be atleast 6 characters',
            'admin_confirm_password.required' => 'Confirm password is required',
            'admin_confirm_password.same' => 'Confirm password must match New Password'

        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $admin = Logins::first();
        if (!$admin || !Hash::check($request->admin_old_password, $admin->password)) {
            return response()->json([
                'code' => 403,
                'message' => 'Old password is Incorrect'
            ]);
        }

        $admin->password = Hash::make($request->admin_new_password);
        $admin->save();
        return response()->json([
            'code' => 200,
            'message' => 'Password updated Successfully'
        ]);
    }

    public function storeTeacherAssignClass(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'teacher_id' => 'required|integer|exists:teachers,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'class_id' => 'required|integer|exists:classes,id'
        ], [
            'teacher_id.required' => 'The Teacher Name is required',
            'subject_id.required' => 'The Subject Name is required',
            'class_id.required' => 'The Class Name is required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        // $teacherAssign = new TeacherAssignClass;
        // $teacherAssign->save($request->only([
        //     'teacher_id', 'subject_id', 'class_id'
        // ]));
        $teacherAssign = new TeacherAssignClass();
        $teacherAssign->teacher_id = $request->teacher_id;
        $teacherAssign->subject_id = $request->subject_id;
        $teacherAssign->class_id = $request->class_id;
        $teacherAssign->save();
        return response()->json([
            'status' => 200,
            'message' => 'Teacher Assigned Class Successfully'
        ]);

    }
    public function updateTeacherAssignClass(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'teacher_id' => 'required|integer|exists:teachers,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'class_id' => 'required|integer|exists:classes,id'
        ], [
            'teacher_id.required' => 'The Teacher Name is required',
            'subject_id.required' => 'The Subject Name is required',
            'class_id.required' => 'The Class Name is required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validate->errors()
            ]);
        }
        $teacherAssignClass = TeacherAssignClass::find($id);
        $teacherAssignClass->update($request->only([
            'teacher_id', 'subject_id', 'class_id'
        ]));
        return response()->json([
            'status' => 200, 
            'message' => 'Teacher Assign Class Updated Successfully'
        ]);
    }
    public function deleteTeacherAssignClass($id)
    {
        $teacherAssign = TeacherAssignClass::find($id);
        $teacherAssign->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully'
        ]);
    }
}
