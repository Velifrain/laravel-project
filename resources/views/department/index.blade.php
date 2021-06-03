@extends('layouts.app')

@section('title-block')Отделы@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>Отделы</h1>
            </div>
            <div class="col-6 pt-2">
                <a href=""><button class="btn btn-success float-right">Добавить Отдел</button></a>
            </div>

        </div>
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
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td colspan="3" class="float-right">
                    <a href="#"><button class="btn btn-primary">Редак.</button></a>
                    <a href="#"><button class="btn btn-danger">Удалить</button></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection
