@extends('layouts.app')

@include('layouts.header')

@section('content')
<div class="search-bar my-4">
    <!-- <form class="d-flex justify-content-center" action="{{ route('search') }}" method="GET"> -->
        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" name="query" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>

<div class="container mt-5">
    <h2>Danh sách sản phẩm</h2>
    <div class="row">
        @if($products->count() > 0)
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div style="overflow: hidden; height: 200px;">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Giá: {{ $product->price }} vđn</p>
                        <form action="{{ route('cart.add', ['product_id' => $product->id]) }}" method="POST">
                            @csrf
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No products found.</p>
            </div>
        @endif
    </div>
    <!-- {{ $products->links() }} -->
</div>

<!-- @include('layouts.footer') -->
@endsection
