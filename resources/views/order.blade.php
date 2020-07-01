@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Оставьте заявку и мы свяжемся с Вами в ближайшее время</div>
                    <form action="{{route('order')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>name</td>
                                <td>
                                    <?php /** @var \App\Order $order */ ?>
                                    <input type="text" name="id" value="{{$order->product_id}}" hidden>
                                    @if ($errors->has('product->id'))
                                        <div class="alert alert-danger">{{$errors->first('product->id')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>
                                    <input type="text" name="name" value="{{$order->name}}">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>price</td>
                                <td>
                                    <input type="email" name="email" value="{{$order->email}}">
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Заказать">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
