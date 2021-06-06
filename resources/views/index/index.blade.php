@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
    <div class="container">
        <h1 class="my-5">Общая информация</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" colspan="2"> </th>
                 @foreach($departments as $dep)
                    <!-- Шапка названия отделов -->
                    <th scope="col">{{ $dep->name_department }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->departments }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
