@extends('layouts.app')

@section('title-block')Сотрудники@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h1>Сотрудники</h1>
                </div>
                <div class="float-right mt-2">
                    <a href="{{ route('employee.create') }}" class="btn btn-success"
                       role="button">Добавить Сотрудника</a>
                </div>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success py-5">
                {{ $message }}
            </div>
        @endif

        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Пол</th>
                <th scope="col">З.п</th>
                <th scope="col">Название отдела</th>
                <th scope="col">Редактирование</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->sex }}</td>
                <td>{{ $employee->salary }}</td>
                <td>Название отдела должно быть через ","</td>
                <td>
                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary" role="button">Редак.</a>
                    <a href="#" class="btn btn-danger" role="button">Удалить</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
