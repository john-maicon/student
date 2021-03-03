@extends('templates.template')

@section('content')

<h1 class="text-center mt-5">Gestão de alunos</h1> <hr>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('admin.students.store') }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('description') is-invalid @enderror"
                                    aria-describedby="emailHelp"
                                    value="{{ old('email') }}"
                                >
                                @error('name')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Logo</label>
                                <div class="" style="height: 142px;">
                                    <div class="image" style="
                                        display: flex;
                                        -webkit-box-pack: center;
                                        justify-content: center;
                                        -webkit-box-align: center;
                                        align-items: center;
                                        height: inherit;
                                    ">
                                        <img id="previewImageFormCompany"
                                            style="
                                                max-width: 100%;
                                                max-height: 100%;
                                            "
                                            src="{{isset($student->image) ? url("storage/{$student->image}") : 'https://via.placeholder.com/250' }}">
                                        <div class="custom-file" style="
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            height: 100%;
                                            opacity: 0;
                                            display: -webkit-box;
                                            display: flex;
                                        ">
                                            <input
                                                style="
                                                    height: auto;
                                                    cursor: pointer;"
                                                type="file"
                                                name="image"
                                                id="customFileFormCompany"
                                                class="custom-file-input"
                                                value="{{ $student->image ?? '' }}">
                                            <label for="image" id="customFileLabelCompany" class="custom-file-label name-file">
                                                Adicionar foto do aluno
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div role="alert" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione uma Turma</label>
                                <select class="form-control @error('school_classes_id') is-invalid @enderror"
                                    name="school_classes_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach ($schoolClassess as $schoolClass)
                                        @if($schoolClass->id == old('school_classes_id'))
                                            <option value={{$schoolClass->id}} selected>
                                                {{$schoolClass->description}}
                                            </option>
                                        @else
                                        <option value={{$schoolClass->id}}>
                                            {{$schoolClass->description}}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('school_classes_id')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
