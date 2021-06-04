@extends('layouts.app')

@section('title-block')Сотрудники@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
            <h1>Сотрудники</h1>
            </div>
            <div class="col-6 pt-2">
                <a href="{{ route('create_em') }}"><button class="btn btn-success float-right">Добавить Сотрудника</button></a>
            </div>

        </div>
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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>male</td>
                <td>10000</td>
                <td>Продажи</td>
                <td>
                    <a href="#" class="btn btn-primary" role="button">Редак.</a>
                    <a href="#" class="btn btn-danger" role="button">Удалить</a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

