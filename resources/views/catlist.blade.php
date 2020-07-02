@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category</div>

                    <div class="card-body">
                        <a class="create-cat catlist" href="{{route('createcat')}}">Добавить категорию</a>

                        <table class="table table-bordered">
                            @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->desc}}</td>
                                    <td>
                                        <a class="catlist" href="{{route('editcat', ['id' => $cat->id])}}">Редактировать</a>
                                    </td>
                                    <td>
                                        <a class="catlist" href="{{route('deletecat', ['id' => $cat->id])}}">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
