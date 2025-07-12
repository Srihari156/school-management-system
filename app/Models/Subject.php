<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = ['subject'];

    public $timestamps = false;

    public function assignedClasses()
    {
        return $this->hasMany(TeacherAssignClass::class, 'subject_id');
    }
    
}
