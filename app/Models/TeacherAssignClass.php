<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAssignClass extends Model
{
    use HasFactory;
    
    protected $table = 'teacher_assign_classes';
    protected $fillable = ['teacher_id', 'subject_id', 'class_id'];

    public $timestamps = false;

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function classes()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');        
    }
}
