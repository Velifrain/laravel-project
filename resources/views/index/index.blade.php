@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
    <div class="container">
        <h1 class="my-5">Общая информация</h1>
        <table class="table">
            @if(count($departments)>=1 && count($employees)>=1)
            <thead>
            <tr>
                <th scope="col" colspan="1"></th>
                @foreach( $departments as $deps)
                    <th scope="col">{{ $deps->name_department }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $emp)
                <tr>
                    <th scope="col">{{ $emp->name }}</th>
                    @foreach($departments as $dep)
{{--                        <td>{{ dd($emp->combine_dep) }}</td>--}}
                        <td> @if($emp->combine_dep)
                                @if(str_contains($emp->combine_dep, $dep->name_department))
                                    {{ '✔' }}
                                @else
                                    {{ '-' }}
                                @endif
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
            @else

            <p>Информация отсутствует</p>

            @endif
        </table>
    </div>
@endsection
