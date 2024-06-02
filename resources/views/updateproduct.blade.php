@include('layouts.header')

<div class="col-md-8">
  <div class="card">
    <div class="card-header"><b>Sửa thông tin Sản Phẩm</b></div>

    <div class="card-body"> 
        <form action="/updateStore/{{ $product->id}}" ebctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <lable for="name" class="form-label">Tên sản phẩm</lable>
                <input type="text" class="form-control" id="name" name="name" require value="{{$product -> name}}">
            </div>
            <div class="mb-3">
                <lable for="name" class="form-label">Mô tả</lable>
                <textarea  class="form-control" id="description" name="desciption" require value="">{{$product -> name}}</textarea>
            </div>
            <div class="mb-3">
                <lable for="name" class="form-label">Tên sản phẩm</lable>
                <input type="text" class="form-control" id="name" name="name" require value="{{$product -> name}}">
            </div>
            <div class="mb-3">
                <lable for="name" class="form-label">Tên sản phẩm</lable>
                <input type="text" class="form-control" id="name" name="name" require value="{{$product -> name}}">
            </div>
        </form>

    </div>

    

  </div>
</div>