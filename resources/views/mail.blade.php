@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ваш заказ принят!</div>
                    <div class="controls controls__home">
                        <a href="{{route('home')}}">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
