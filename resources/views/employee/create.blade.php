@extends('layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <h3 class="my-5 text-center"> Новый сотрудник </h3>
            <form action="{{ route('employee.store') }}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="validationCustom01" class="form-label">Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" id="validationCustom01" placeholder="Введите имя">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustom02" class="form-label">Фамилия</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror"
                           name="surname" value="{{ old('surname') }}" id="validationCustom02" placeholder="Введите фамилия">
                    @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustomUsername" class="form-label">Отчество</label>
                    <input type="text" class="form-control @error('patronymic') is-invalid @enderror"
                           name="patronymic" value="{{ old('patronymic') }}" id="validationCustomUsername" placeholder="Введите отчество">
                    @error('patronymic')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="sex">Пол</label>
                        <select class="form-control" id="sex" name="sex">
                            <option value="М"{{ $employee->sex == "М" ? 'selected' : ''}}>М</option>
                            <option value="Ж"{{ $employee->sex == "Ж" ? 'selected' : ''}}>Ж</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="validationCustomUsername" class="form-label">Заробатная плата</label>
                    <input type="text" class="form-control @error('salary') is-invalid @enderror"
                           name="salary" value="{{ old('salary') }}" id="validationCustomUsername">
                    @error('salary')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Отдел</label>
                        <select class="form-control @error('department_id') is-invalid @enderror" size="3" multiple
                                name="department_id[]" id="exampleFormControlSelect1">
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name_department }}</option>
                            @endforeach
                        </select>
                    @error('department_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Создать</button>
            </form>
        </div>
    </div>
@endsection
