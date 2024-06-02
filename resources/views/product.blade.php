@include('layouts.header')

<div class="container mt-5">
    <h2 class="mb-4">Danh sách sản phẩm</h2>
    <table class="table table-bordered">
        <a type="button" class="btn btn-primary" href="{{route('addproduct')}}">Add Product</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <!-- <th>Số lượng</th> -->
                <th>Giá tiền</th>
                <th>comment</th>
            </tr>
        </thead>
        <tbody>
                
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td> <img src="{{ asset('storage/' . $product->image) }}"  style="max-width: 100px;" class="mb-2"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                        data-bs-target="#category{{$product->id}}">
                        Edit</button>

                    <!-- Modal -->
                    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal fade" id="category{{$product->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                value="{{$product->name}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"
                                                required value="{{$product->description}}"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá</label>
                                            <input type="number" class="form-control" id="price" name="price" min="0"
                                                step="0.01" required value="{{$product->price}}">
                                        </div>

                                        <!-- <div class="mb-3">
                                            <label for="price" class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                min="0" required value="{{$product->quantity}}">
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file" class="form-control" id="image" name="image" required
                                                value="{{$product->image}}">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button type="submit" class="btn btn-danger btn-sm delete-product"
                        data-url="{{ route('product.delete', ['id' => $product->id]) }}">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Button trigger modal -->

</div>
@include('layouts.footer')
