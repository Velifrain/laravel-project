@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
    <div class="container">
        <h1 class="my-5">Общая информация</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" colspan="1"> </th>
                @foreach($employees as $emp)
                    <th scope="col">{{ $emp->name_department }}</th>
                    <!-- Шапка названия отделов -->
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $emp)
                <tr>
                    <td>{{ $emp->name }}</td>
                    @foreach($employees as $emp)
                    <td>@if($emp->name_department == $emp->name)  {{ $emp->id }} @endif</td>
                    <!-- Шапка названия отделов -->

                    @endforeach
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
