<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Imports\StudentsImport;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function index()
    {
        $queryParam = [];
        $students = new Student();

        if(request()->name){
            $students = $students->where('name', 'LIKE', "%".request()->name."%");
            $queryParam = ['name' => request()->name];
        }

        $students = $students
        ->orderBy('name')
        ->paginate(Student::DEFAULT_PER_PAGE)->appends($queryParam);


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

    public function store(StoreRequest $request)
    {
        Student::createStudent($request);
        return redirect()->route('admin.students.index')->withSuccess(__('Aluno cadastrado com sucesso'));
    }

    public function edit(Student $student)
    {
        $schoolClassess =  SchoolClass::all()->sortBy('description');

        return view('admin.student.edit', [
            'student' => $student,
            'schoolClassess' => $schoolClassess,
        ]);
    }

    public function update(UpdateRequest $request, Student $student )
    {
        Student::updateStudent($request, $student);
        return redirect()->route('admin.students.index')->withSuccess(__('Aluno alterado com suscesso'));
    }

    public function destroy(Student $student)
    {

        if (!$student)
        return redirect()->back();

        if (Storage::exists($student->image)) {
            Storage::delete($student->image);
        }

        $student->delete();
        return response()->json(['message' => __('Aluno deletado com sucesso')]);
    }

    public function show(Student $student)
    {
        return view('admin.student.show', ['student' => $student]);
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }

    public function import(Request $request)
    {
        $user = Auth::user();

        if($request->hasFile('file')){
            $file = $request->file('file');
            if($file->getMimeType() === "text/plain") {
               Excel::import(new StudentsImport, $request->file('file'));
                $user->sendEmailFileUpload();
                return redirect()->route('admin.students.index')->withSuccess(__('Arquivo enviado com Suscesso'));
            }
            return redirect()->back()->withError(__('Permitido somente arquivo .CSV'));
        }
    }

}
