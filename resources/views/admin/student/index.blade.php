@extends('templates.template')

@section('content')
<h1 class="text-center mt-5">Gestão de alunos</h1> <hr>



    <div class="row mb-5 d-flex justify-content-end">
        <div class="col">
            <a class="btn btn-primary float-right" href="{{ route('admin.students.create') }}">Cadastrar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table ">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Operações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{$student->id}}</th>
                        <td> {{$student->name}}</td>
                        <td> {{$student->email}}</td>
                        <td> {{$student->schoolClass->description}}</td>
                        <td>
                            <a href="" class="">
                                <button class="btn btn-dark">Visualizar</button>
                            </a>
                            <a href="" class="">
                                <button class="btn btn-info">Editar</button>
                            </a>
                            <a href="" class="">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>


@endsection
