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

        @include('include.flash-message')

        <table class="table mt-5">
            <thead>
            <tr>
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
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->patronymic  }}</td>
                    <td>{{ $employee->sex }}</td>
                    <td>${{ $employee->salary }}</td>
                    <td>{{ $employee->departments->implode('name_department', ',') }}</td>
                    {{--                <td>{{ $employee->department->implode('name_department', ',') }}</td>--}}
                    <td>
                        <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                            <a class="btn btn-primary"
                               href="{{ route('employee.edit',$employee->id) }}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right justify-content-center">
            {!! $employees->links() !!}
        </div>
    </div>
@endsection
