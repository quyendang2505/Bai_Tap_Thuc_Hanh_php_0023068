@extends('sinhvien.layout1')

@section('title', 'Chỉnh sửa lớp học')

@section('content')
    <div class="page-header">
        <div><h1>Chỉnh sửa lớp học</h1><p>Cập nhật thông tin của {{ $lopHoc->ma_lop }}.</p></div>
        <a href="{{ route('lophoc.index') }}" class="btn btn-secondary">← Danh sách</a>
    </div>

    <section class="card form-card">
        @if ($errors->any())
            <div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form method="POST" action="{{ route('lophoc.update', $lopHoc) }}">
            @csrf @method('PUT')
            @include('lop_hocs.form', ['lopHoc' => $lopHoc])
            <div class="form-actions"><button class="btn" type="submit">Cập nhật</button><a class="btn btn-secondary" href="{{ route('lophoc.index') }}">Hủy</a></div>
        </form>
    </section>
@endsection
