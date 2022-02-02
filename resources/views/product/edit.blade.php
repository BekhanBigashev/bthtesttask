@extends('base')

@section('content')
    <h1>Edit Item</h1>
    <form method="POST" action="{{route('products.update', $product->id)}}">
        @csrf
        <input type="hidden" name="_method"  value="PUT">
        <div class="form-group">
            <input value="{{$product->name}}" class="form-control"  type="text" name="name" placeholder="Имя">
        </div>
        <div class="form-group">
            <select class="form-control"  name="status" id="">
                <option value="available">available</option>
                <option value="unavailable">unavailable</option>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" value="{{$product->data['color']}}" type="text" name="color" placeholder="Цвет">
        </div>
        <div class="form-group">
            <input value="{{$product->data['size']}}" class="form-control"  type="text" name="size" placeholder="Размер">
        </div>
        <div class="form-group">
            <input  value="{{$product->data['weight']}}" class="form-control"  type="text" name="weight" placeholder="Вес">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
