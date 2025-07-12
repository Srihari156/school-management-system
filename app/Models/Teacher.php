<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $table = 'teachers';
    
    protected $fillable = [
        'name', 
        'age', 
        'dob', 
        'father_name', 
        'mother_name', 
        'degree', 
        'experience', 
        'subject_id', 
        'mobile_no', 
        'blood_group', 
        'address', 
        'password', 
        'role'
    ];

   

    public $timestamps = false;

    // Use name instead of email for authentication
    public function getAuthIdentifierName()
    {
        return 'name';
    }

    // Relationships
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacherAssigned()
    {
        return $this->hasMany(TeacherAssignClass::class, 'teacher_id');
    }
}