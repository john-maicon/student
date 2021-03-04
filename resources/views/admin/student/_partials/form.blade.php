<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Nome</label>
            <input
                type="text"
                name="name"
                class="form-control @error('description') is-invalid @enderror"
                value="{{ isset($student) ? $student->name :  old('name')  }}"
            >
            @error('name')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                aria-describedby="emailHelp"
                value="{{ isset($student) ? $student->email :  old('email')  }}"
            >
            @error('email')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">

        <div class="form-group">
            <label class="">Foto</label>
            <div class="" style="height: 142px;">
                <div class="image">
                    <img
                        id="previewImageStudent"
                        src="{{isset($student->image) ? url("storage/{$student->image}") : 'https://via.placeholder.com/250' }}">
                    <div class="custom-file">
                        <input
                            type="file"
                            name="image"
                            id="customFileStudent"
                            class="custom-file-input"
                            value="{{ $student->image ?? '' }}">
                        <label for="image" id="customFileLabelStudent" class="custom-file-label name-file">
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
                    @if(isset($student) ? $schoolClass->id == $student->school_classes_id :  old('school_classes_id'))
                        <option value={{$schoolClass->id}} selected >
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
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>

