<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;




Route::get("/", [LoginController::class, 'adminLogin'])->name('login.admin');
Route::get('/teacher-login', [LoginController::class, 'teacherLogin'])->name('login.teacher');
Route::get('/contact-us', [LoginController::class, 'contactUs'])->name('login.contact');
Route::post('/admin-login', [LoginController::class, 'storeAdmin'])->name('storeLogin');
Route::post('/teacher-login-store', [LoginController::class, 'storeTeacher'])->name('store.teacher-login');

Route::middleware(['is.Admin'])->prefix("admin")->group(function () {
    Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/store-classes', [AdminController::class, 'storeClass'])->name('store.class');
    Route::put('/update-class/{id}', [AdminController::class, 'updateClass'])->name('update.class');
    Route::delete('/delete-class/{id}', [AdminController::class, 'deleteClass'])->name('delete.class');
    Route::post('/store-student', [AdminController::class, 'storeStudent'])->name('store.student');
    Route::post('/store-subject', [AdminController::class, 'storeSubject'])->name('store.subject');
    Route::put('/update-subject/{id}', [AdminController::class, 'updateSubject'])->name('update.subject');
    Route::delete('/delete-subject/{id}', [AdminController::class, 'deleteSubject'])->name('delete.subject');
    Route::post('/store-teacher', [AdminController::class, 'storeTeacher'])->name('store.teacher');
    Route::put('/update-teacher/{id}', [AdminController::class, 'updateTeacher'])->name('update.teacher');
    Route::delete('/delete-teacher/{id}', [AdminController::class, 'deleteTeacher'])->name('delete.teacher');
    Route::put('/update-student/{id}', [AdminController::class, 'updateStudent'])->name('update.student');
    Route::delete('/delete-student/{id}', [AdminController::class, 'deleteStudent'])->name('delete.student');
    Route::post('/admin-password-update/', [AdminController::class, 'adminUpdatePassword'])->name('update.password');
    Route::post('/teacher-assign-class-store', [AdminController::class, 'storeTeacherAssignClass'])->name('store.teacher-assign-class');
    Route::put('/update-teacher-assign-class/{id}', [AdminController::class, 'updateTeacherAssignClass'])->name('update.teacher-assign-class');
    Route::delete('/delete-teacher-assign-class/{id}', [AdminController::class, 'deleteTeacherAssignClass'])->name('delete.teacher-assign-class');
    Route::get('/pages', [AdminController::class, 'admin'])->name('admin.admin-page');
    Route::get('/student-add', [AdminController::class, 'adminStudentAdd'])->name('admin.admin-student-add');
    Route::get('/class-adds', [AdminController::class, 'adminClassAdd'])->name('admin.admin-class-add');
    Route::get('/subject-adds', [AdminController::class, 'adminSubjectAdd'])->name('admin.admin-subject-add');
    Route::get('/teacher-adds', [AdminController::class, 'adminTeacherAdd'])->name('admin.admin-teacher-add');
    Route::get('/assign-teacher-classes', [AdminController::class, 'adminAssignTeacher'])->name('admin.admin-assign-teacher-class');
    Route::get('/change-passwords', [AdminController::class, 'adminChangePassword'])->name('admin.admin-change-password');
});
Route::middleware(['is.Teacher'])->prefix("teacher")->group(function () {
    Route::post('/teacher-logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    Route::get('/get-students/{class_id}', [TeacherController::class, 'getStudentsByClass'])->name('get.students.by.class');
    Route::post('/store-leave-status', [TeacherController::class, 'storeLeaveStatus'])->name('store.leave-status');
    Route::post('/store-attendance', [TeacherController::class, 'storeAttendance'])->name('store.attendance');
    Route::post('/monthly-reports-search', [TeacherController::class, 'monthlyReports'])->name('search.monthly-reports');
    Route::post('/student-status-get', [TeacherController::class, 'studentStatus'])->name('student.status.get');
    Route::post('/store-teacher-change-password', [TeacherController::class, 'storeTeacherchangePassword'])->name('store.teacher-change-password');
    Route::get('/pages', [TeacherController::class, 'teacher'])->name('teacher.teacher-page');
    Route::get('/student-leave-status', [TeacherController::class, 'studentLeaveStatus'])->name('teacher.teacher-student-leave-status');
    Route::get('/monthly-reports', [TeacherController::class, 'teacherMonthlyReports'])->name('teacher.teacher-monthly-reports');
    Route::get('/student-status-attendance', [TeacherController::class, 'teacherStudentStatus'])->name('teacher.teacher-student-status-attendance');
    Route::get('/change-password', [TeacherController::class, 'teacherChangePassword'])->name('teacher.teacher-change-password');
});


