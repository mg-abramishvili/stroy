@extends('layouts.admin')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Квартиры</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/types/create" class="btn btn-primary">Добавить</a>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <th>Название</th>
                <th style="text-align: center;">Счёт</th>
                <th></th>
            </thead>
            <tbody>
                @forelse($types as $type)
                    <tr>
                        <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                            {{$type->name}}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            {{ $type->score }}
                        </td>
                        <td style="width: 25%; text-align: center;">
                            <a href="/types/{{$type->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection