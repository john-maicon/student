@extends('templates.template')

@section('content')
<main class="content" data-token="{{ csrf_token() }}" data-message="{{ session('success') }}">

<h1 class="text-center mt-5 mb-5">Gestão de alunos  <hr></h1>



    <div class="row mb-5 ">
            <div class="col-6">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="search" name="name" value="{{ request()->name }}"
                            class="form-control text-secondary" placeholder="Digite o nome do aluno">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                                buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="{{ route('admin.students.create') }}">Cadastrar</a>
            </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table ">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Turma</th>
                    <th scope="col" width="250px">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td> {{$student->name}}</td>
                        <td> {{$student->email}}</td>
                        <td> {{$student->schoolClass->description}}</td>
                        <td>
                            <a href="">
                                <button class="btn btn-warning  btn-sm"><i class="fas fa-eye"></i> Ver</button>
                            </a>
                            <a href="{{route('admin.students.edit', ['student' => $student ])}}">
                                <button class="btn btn-info  btn-sm"><i class="fas fa-pencil-alt"></i>Editar</button>
                            </a>
                            <a
                            href="#!"
                            id="delete-item"
                            class="btn btn-danger btn-sm"
                            data-urldel="{{route('admin.students.destroy', $student->id)}}">
                            <i class="fas fa-trash"></i> Delete
                         </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{ $students->links() }}
        </ul>
        <ul class="pagination pagination-sm m-0 float-left">
            <p>Mostrando de {{$students->currentPage()}} até {{$students->count()}} de
                {{$students->total() > 1 ? 'registros' : 'registro'}}</p>
        </ul>
    </div>
</main>
@endsection

@section('js')
    <script src="{{asset('js/student.js')}}"></script>
@stop
