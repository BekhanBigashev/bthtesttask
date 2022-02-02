@extends('base')

@section('content')
    <div class="row d-flex justify-content-around">
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product->art}}</h6>

                    <div class="d-flex justify-content-around">
                        <a href="{{route('products.edit', $product->id)}}" class="card-link">Edit</a>

                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button class="btn" type="submit"><a class="card-link">Delete</a></button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

@endsection
