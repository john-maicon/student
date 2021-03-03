<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students =  Student::all()->sortBy('name');

        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        $schoolClassess =  SchoolClass::all()->sortBy('description');

        return view('admin.student.create', [
            'schoolClassess' => $schoolClassess,
        ]);
    }
}
