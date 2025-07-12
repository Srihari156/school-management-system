<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['class_name']; 
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
    public function teacherAssigned()
    {
        return $this->hasMany(TeacherAssignClass::class, 'class_id');
    }
}
