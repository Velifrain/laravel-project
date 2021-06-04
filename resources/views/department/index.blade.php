@extends('layouts.app')

@section('title-block')Отделы@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1>Отделы</h1>
                </div>
                <div class="pull-right">
                    <a href="{{ route('department.create') }}" class="btn btn-success" role="button">Добавить
                        Отдел</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table mt-5">
            <thead>

            <tr>
                <th scope="col">Название отдела</th>
                <th scope="col">Кол. сотрудников</th>
                <th scope="col">Макс. зп сотрудника</th>
                <th scope="col">Редактир.</th>
            </tr>

            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->name_department }}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <form action="{{ route('department.destroy',$department->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('department.edit',$department->id) }}">Редактировать</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
{{--                        <a href="{{ route('department.edit', $department) }}" class="btn btn-primary">Редак.</a>--}}
{{--                        <a href="#" class="btn btn-danger">Удалить</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
