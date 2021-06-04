@extends('layouts.app')

@section('title-block')Правка отдела@endsection

@section('content')
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <h3 class="my-5 text-center"> Правки Отдела </h3>

            <form action="{{ route('department.update', $department->id) }}" method="post" class="needs-validation">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="validationCustom01" class="form-label">Имя отдела</label>
                    <input type="text" value="{{ $department->name_department }}"
                           class="form-control @error('name_department') is-invalid @enderror"
                           name="name_department" id="validationCustom01" placeholder="Введите имя отдела">
                    @error('name_department')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
        </div>
    </div>
@endsection
