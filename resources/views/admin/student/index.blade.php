@extends('templates.template')

@section('content')
<main class="content" data-token="{{ csrf_token() }}"  data-error="{{ session('error') }}" data-message="{{ session('success') }}">

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
                <a class="btn btn-dark btn-lg float-right" href="{{ route('admin.students.create') }}">Cadastrar</a>
            </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-10">
            <form action="{{route('admin.students-import.excel')}}" method="POST" enctype="multipart/form-data">
               <div class="d-flex">
                    @csrf
                    <div class="custom-file mb-3">
                        <input type="file" name="file" class="custom-file-input" id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile"></label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    <button class="btn btn-primary ml-3" type="submit" style="height: 40px;">Enviar</button>
               </div>
            </form>
        </div>
        <div class="col-2">
            <a href="{{route('admin.students-export.excel')}}" class="btn btn-success float-right" style="height: 40px;">Download</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                            <a href="{{route('admin.students.show', ['student' => $student ])}}">
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
