@extends('layouts.app')

@section('content')

        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h3 class="my-5 text-center"> Новый сотрудник </h3>


        <form action="{{ route('create_em-form') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="validationCustom01" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="validationCustom01" placeholder="Введите имя">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="validationCustom02" class="form-label">Фамилия</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="validationCustom02" placeholder="Введите фамилия">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="validationCustomUsername" class="form-label">Отчество</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="validationCustomUsername" placeholder="Введите отчество">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Пол</p>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="exampleRadios1"
                           value="female">
                    <label class="form-check-label" for="exampleRadios1">
                        Ж
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="exampleRadios2"
                           value="male" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        М
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="validationCustomUsername" class="form-label">Заробатная плата</label>
                <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="validationCustomUsername">
                @error('salary')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                    <label for="exampleFormControlSelect1">Отдел</label>
                    <select class="form-control" name="department" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
            </div>
                <button class="btn btn-primary" type="submit">Создать</button>
        </form>
        </div>
        </div>
@endsection
