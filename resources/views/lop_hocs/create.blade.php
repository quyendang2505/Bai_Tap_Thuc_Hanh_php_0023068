@extends('sinhvien.layout1')

@section('title', 'Thêm lớp học')

@section('content')
    <div class="page-header">
        <div><h1>Thêm lớp học</h1><p>Nhập thông tin lớp học mới.</p></div>
        <a href="{{ route('lophoc.index') }}" class="btn btn-secondary">← Danh sách</a>
    </div>

    <section class="card form-card">
        @if ($errors->any())
            <div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form method="POST" action="{{ route('lophoc.store') }}">
            @csrf
            @include('lop_hocs.form', ['lopHoc' => null])
            <div class="form-actions"><button class="btn" type="submit">Lưu lớp học</button><a class="btn btn-secondary" href="{{ route('lophoc.index') }}">Hủy</a></div>
        </form>
    </section>
@endsection
