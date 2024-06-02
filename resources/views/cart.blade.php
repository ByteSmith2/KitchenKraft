@include('layouts.header')

<div class="container mt-5">
    <h2>Giỏ hàng</h2>
    <div class="row">
        <div class="col-md-8">
            @if(count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>

                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] * $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', ['id' => $id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}"
                                    class="btn btn-outline-secondary">-</button>

                                <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}"
                                    class="btn btn-outline-secondary">+</button>
                            </form>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger delete-cart"
                                data-url="{{ route('cart.delete', ['id' => $id]) }}">Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end">
                <h5>Tổng tiền: <span id="total-price">{{ $totalPrice }}</span></h5>
            </div>
            @else
            <p>Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')
