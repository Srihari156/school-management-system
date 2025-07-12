<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name', 'age', 'dob', 'father_name', 'mother_name','district', 'city', 'state',
        'nationality', 'father_occupation', 'mother_occupation', 'mobile_no','address', 'bloodgroup',
        'class_id'
    ];
    public $timestamps = false;
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    
}
