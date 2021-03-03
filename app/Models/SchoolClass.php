<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    public function student ()
    {
        return $this->hasMany(Student::class, 'school_classes_id', 'id');
    }
}
