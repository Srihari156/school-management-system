<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmountModel extends Model
{
    use HasFactory;

    protected $table = 'amounts';

    protected $fillable = ['student_id', 'email', 'class_name', 'amount', 'payment_id', 'status'];

    public $timestamps = false;

     public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
