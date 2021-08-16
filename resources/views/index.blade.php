@extends('layouts.admin')
@section('content')

    <div class="px-4 py-4">
        <div class="row">
            <div class="col-12 mb-4" style="text-align: center;">
                <a href="/" class="btn btn-primary">Выйти</a>
            </div>
        
            <div class="col-6">
                <h2>Отделка</h2>
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

                <h2>Потолки</h2>

                <table class="table table-bordered table-hover">
                    <thead>
                        <th>Название</th>
                        <th style="text-align: center;">Счёт</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($roofs as $roof)
                            <tr>
                                <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                                    {{$roof->name}}
                                </td>
                                <td style="width: 10%; text-align: center;">
                                    {{ $roof->score }}
                                </td>
                                <td style="width: 25%; text-align: center;">
                                    <a href="/roofs/{{$roof->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
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
            <div class="col-6">
                <h2>Комментарии и пожелания</h2>
                <div style="height: 85vh; overflow-y: auto;">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                                        {{$comment->comment}}
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
            </div>
        </div>
    </div>
@endsection