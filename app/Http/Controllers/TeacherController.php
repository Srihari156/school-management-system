<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\StudentLeaveStatus;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function studentLeaveStatus()
    {
        $student = Student::all();
        $class = ClassModel::all();
        return view('teacher-pages.teacher-student-leave-status', compact('class', 'student'));
    }
    public function teacher()
    {
        // $teacherId = session('teacher_id');
        // $teacher = Teacher::find($teacherId);
        $teacher = Auth::guard('teacher')->user();
        return view('teacher-pages.teacher-page', compact('teacher'));
    }
    public function teacherChangePassword()
    {
        return view('teacher-pages.teacher-change-password');
    }
    public function teacherMonthlyReports()
    {
        $class = ClassModel::all();
        return view('teacher-pages.teacher-monthly-reports', compact('class'));
    }
    public function teacherStudentStatus()
    {
        $student = Student::all();
        return view('teacher-pages.teacher-student-status', compact('student'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'redirect' => route('login.teacher'),
            'message' => 'logout Successfuly'
        ]);
    }
    public function getStudentsByClass($class_id)
    {
        $students = Student::where('class_id', $class_id)->get(['id', 'name']);
        
        return response()->json([
            'status' => 200,
            'students' => $students
        ]);
    }

    public function storeLeaveStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'student_class' => 'required|exists:classes,id',
            'student_name' => 'required|string',
            'date' => 'required|date',
            'reason_status' => 'required|string'
        ], [
            "student_class.required" => "Select the Class is required",
            "student_name.required" => "Select the Student name is required",
            "date.required" => 'Date is required',
            "reason_status.required" => "Fill the reason is required"
        ]);
        if ($validate->fails()) {
            return response()->json([
                "code" => 422,
                "error" => $validate->errors()
            ]);
        }


        $statusLeave = new StudentLeaveStatus;
        $statusLeave->class_id = $request->student_class;
        $statusLeave->student_id = $request->student_name;
        $statusLeave->date = $request->date;
        $statusLeave->status = $request->reason_status;
        $statusLeave->save();

        return response()->json([
            'code' => 200,
            'message' => 'Leave Status Added Successfully'
        ]);
    }


    public function monthlyReports(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_class' => 'required|exists:classes,id',
            'student_select' => 'required|array',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ], [
            'student_class.required' => 'Select the class is required',
            'student_select.required' => 'Select the student name is required',
            'from_date' => 'From date is required',
            'to_date' => 'To date is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validator->errors()
            ]);
        }
        $from = $request->from_date;
        $to = $request->to_date;
        $studentId = $request->student_select;
        $classId = $request->student_class;
        $leaveData = StudentLeaveStatus::with(['student', 'classes'])
            ->whereIn('student_id', $studentId)
            ->where('class_id', $classId)
            ->whereBetween('date', [$from, $to])
            ->get();
        if ($leaveData->isEmpty()) {
            return response()->json([
                'code' => 200,
                'data' => [],
                'chart' => []
            ]);
        }
        // $chartData = $leaveData->groupBy('status')->map(function ($items) {
        //     return count($items);
        // });

        $studentLeaveCounts = $leaveData->groupBy('student_id')->map(function ($items) {
            return count($items);
        });
        $minLeave = $studentLeaveCounts->min();
        $maxLeave = $studentLeaveCounts->max();
        $minStudent = $studentLeaveCounts->filter(function ($count) use ($minLeave) {
            return $count === $minLeave;
        })->keys();
        $maxStudent = $studentLeaveCounts->filter(function ($count) use ($maxLeave) {
            return $count === $maxLeave;
        })->keys();
        // $minStudentName = Student::find($minStudent)?->name ?? 'N/A';
        // $maxStudentName = Student::find($maxStudent)?->name ?? 'N/A';
        $minStudentName = Student::whereIn('id', $minStudent)->get(['id', 'name'])->map(function ($student) use ($minLeave) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'leave' => $minLeave
            ];
        })->values();
        $maxStudentName = Student::whereIn('id', $maxStudent)->get(['id', 'name'])->map(function ($student) use ($maxLeave) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'leave' => $maxLeave
            ];
        })->values();
        $studentNames = Student::whereIn('id', $studentLeaveCounts->keys())->pluck('name', 'id');
        return response()->json([
            'code' => 200,
            'chart' => $studentLeaveCounts,
            'student_name' => $studentNames,
            'min_students' => $minStudentName,
            'max_students' => $maxStudentName,
            'student_names' => $studentNames
        ]);
    }
    public function storeTeacherchangePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'teacher_old_password' => 'required|string',
            'teacher_new_password' => 'required|string',
            'teacher_confirm_password' => 'required|string'
        ], [
            'teacher_old_password.required' => 'Old password is required',
            'teacher_new_password' => 'New password is required',
            'teacher_confirm_password' => 'Confirm password is required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'error' => $validate->errors()
            ]);
        }
        $teacherId = session('teacher_id');
        $teacher = Teacher::find($teacherId);
        if (!$teacher || !Hash::check($request->teacher_old_password, $teacher->password)) {
            return response()->json([
                'code' => 403,
                'message' => 'Old password is Wrong'
            ]);
        }
        if ($request->teacher_new_password !== $request->teacher_confirm_password) {
            return response()->json([
                'code' => 405,
                'message' => 'write correct password'
            ]);
        }
        $teacher->password = Hash::make($request->teacher_new_password);
        $teacher->save();
        return response()->json([
            'code' => 200,
            'message' => 'Changed Password Successfully'
        ]);
    }



}
