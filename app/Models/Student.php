<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mother_name',
        'course_class_id',
        'image'
    ];

    public function schoolClass ()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'school_classes_id');
    }
}
