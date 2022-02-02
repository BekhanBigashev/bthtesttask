@extends('base')

@section('content')
    <h1>Create Item</h1>
    <form method="post" action="{{route('products.store')}}">
        @csrf
        <div class="form-group">
            <input class="form-control"  type="text" name="name" placeholder="Имя">
        </div>
        <div class="form-group">
            <input class="form-control"  type="text" name="art" placeholder="Артикул">
        </div>
        <div class="form-group">
            <select class="form-control"  name="status" id="">
                <option value="available">available</option>
                <option value="unavailable">unavailable</option>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control"  type="text" name="color" placeholder="Цвет">
        </div>
        <div class="form-group">
            <input class="form-control"  type="text" name="size" placeholder="Размер">
        </div>
        <div class="form-group">
            <input class="form-control"  type="text" name="weight" placeholder="Вес">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
