@extends('templates.template')

@section('content')

<main class="content" data-token="{{ csrf_token() }}" data-message="{{ session('success') }}">
<h1 class="mt-5 mb-5">Informações do aluno(a) <b>{{$student->name}}</b> </h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2  mr-5">
                <img
                id="previewImageStudent"
                src="{{isset($student->image) ? url("storage/{$student->image}") : 'https://via.placeholder.com/250' }}">
            </div>
            <div class="col-5 ml-5">
                <ul>
                    <li><strong>Nome:</strong> {{$student->name}}</li>
                    <li><strong>Email:</strong> {{$student->email}}</li>
                    <li><strong>Turma:</strong> {{$student->schoolClass->description}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-footer mt-5">
        <a href="{{ route('admin.students.index')}}" class="btn btn-default cancel">Voltar</a>
    </div>
</div>
</main>
@endsection


@section('js')
    <script src="{{asset('js/student.js')}}"></script>
@stop
