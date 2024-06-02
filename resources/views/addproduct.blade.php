@include('layouts.header')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Sản Phẩm Mới</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" step="0.01"
                                required>
                        </div>
<!-- 
                        <div class="mb-3">
                            <label for="price" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
                        </div> -->

                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
