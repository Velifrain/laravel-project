@extends('layouts.app')

@section('title-block')Редактирование сотрудника@endsection

@section('content')

    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <h3 class="my-5 text-center">Внесение изменений по сотруднику</h3>
            <form action="{{ route('employee.update', $employee->id) }}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="validationCustom01" class="form-label">Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name"  value="{{ $employee->name }}" id="validationCustom01" placeholder="Введите имя">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustom02" class="form-label">Фамилия</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                           name="first_name" value="{{ $employee->first_name }}" id="validationCustom02" placeholder="Введите фамилия">
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustomUsername" class="form-label">Отчество</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                           name="last_name" value="{{ $employee->last_name }}" id="validationCustomUsername" placeholder="Введите отчество">
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="sex">Пол</label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="{{ $employee->sex }}"{{ $employee->sex == "М" ? 'selected' : ''}}>М</option>
                        <option value="{{ $employee->sex }}"{{ $employee->sex == "Ж" ? 'selected' : ''}}>Ж</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="validationCustomUsername" class="form-label">Заробатная плата</label>
                    <input type="text" class="form-control @error('salary') is-invalid @enderror"
                           name="salary" value="{{ $employee->salary }}" id="validationCustomUsername">
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
                <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
        </div>
    </div>
@endsection
