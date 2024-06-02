<!-- thông báo nhanh -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('false'))
<div class="alert alert-danger">
    {{ session('false') }}
</div>
@endif

@if (session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif

<!-- thong bao lỗi từ validate -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
