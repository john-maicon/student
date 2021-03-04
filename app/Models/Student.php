<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    const DEFAULT_PER_PAGE = 10;

    protected $fillable = [
        'school_classes_id',
        'name',
        'email',
        'image'
    ];

    public function schoolClass ()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'school_classes_id');
    }

    public static function createStudent($date)
    {
        $image = Student::uploadImage($date);

        return Student::create([
            'school_classes_id' => $date['school_classes_id'],
            'name' => $date['name'],
            'email' => $date['email'],
            'image' => $image
        ]);
    }

    public static function updateStudent($date, $student)
    {
        $image = Student::uploadImage($date);

        return  $student->update([
            'school_classes_id' => $date['school_classes_id'],
            'name' => $date['name'],
            'email' => $date['email'],
            'image' => $image
        ]);
    }

    public static function uploadImage($data)
    {
        $student = Student::where('email', $data->email)->first();
        if(isset($student)){
            if ($data->hasFile('image') && $data->image->isValid()) {
                if (Storage::exists($student->image)) {
                    Storage::delete($student->image);
                }
               return $data->image->store("students");
            }
            return $student->image;
        }
        if ($data->hasFile('image') && $data->image->isValid()) {
            return $data->image->store("students");
        }
    }
}
