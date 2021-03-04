@extends('templates.template')

@section('content')

<h1 class="text-center mt-5">Gestão de alunos</h1> <hr>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form role="form" action="{{ route('admin.students.update', $student->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    @include('admin.student._partials.form')

                    <div class="row">
                        <div
                            class="modal-footer modal-footer d-flex align-items-center justify-content-sm-between w-100 border-0">
                            <a href="{{route('admin.students.index')}}" type="button"
                                class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="{{asset('js/student.js')}}"></script>
@stop
