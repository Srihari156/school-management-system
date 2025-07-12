<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLeaveStatus extends Model
{
    use HasFactory;
    protected $table = 'student_leave_status';
    protected $fillable = ['date', 'student_id', 'class_id', 'status'];

    public $timestamps = false;
    
    public function classes()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
