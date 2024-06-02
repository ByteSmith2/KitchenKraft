@include('layouts.header')

@section('content')
<div class="search-bar">


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon1">
  <button type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
</div>
</div>
<div class="container mt-5">
    <h2>Danh sách sản phẩm</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div style="overflow: hidden; height: 200px;">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                        style=" ">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Giá: {{ $product->price }} vđn</p>
                    <form action="{{ route('cart.add', ['product_id' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="d-grid gap-2">
                            <!-- <input type="number" name="quantity" class="form-control" value="1" min="1"> -->
                            <button type="submit" class="btn btn-success" >Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')