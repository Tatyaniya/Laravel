@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading controls-title">Редактировать игру</div>
                    <form action="{{route('save', ['id' => $product['id']])}}" method="post">
                        @csrf
                        <table class="table table-bordered table-product">
                            <tr>
                                <td>Название</td>
                                <td>
                                    <input type="text" name="name" value="{{$product->name}}">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Категория</td>
                                <td>
                                    <input type="text" name="category" value="{{$category}}">
                                    @if ($errors->has('category'))
                                        <div class="alert alert-danger">{{$errors->first('category')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Цена</td>
                                <td>
                                    <input type="text" name="price" value="{{$product->price}}">
                                    @if ($errors->has('price'))
                                        <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>
                                    <textarea rows="12" cols="55" name="desc" id="textarea">{{$product->desc}}</textarea>
                                    @if ($errors->has('desc'))
                                        <div class="alert alert-danger">{{$errors->first('desc')}}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <button type="submit" id="create-product">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
