@extends('sinhvien.layout1')

@section('title', 'Thêm sinh viên')

@section('content')
    <div class="page-header"><div><h1>Thêm sinh viên</h1><p>Nhập thông tin sinh viên mới.</p></div><a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">← Danh sách</a></div>
    <section class="card form-card">
        @if ($errors->any())<div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('sinhvien.store') }}">@csrf @include('sinhvien.form', ['student' => null])<div class="form-actions"><button class="btn" type="submit">Lưu sinh viên</button><a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">Hủy</a></div></form>
    </section>
@endsection
