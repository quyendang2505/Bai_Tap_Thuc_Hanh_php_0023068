@extends('sinhvien.layout1')

@section('title', 'Chỉnh sửa sinh viên')

@section('content')
    <div class="page-header"><div><h1>Chỉnh sửa sinh viên</h1><p>Cập nhật thông tin {{ $student['student_id'] }}.</p></div><a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">← Danh sách</a></div>
    <section class="card form-card">
        @if ($errors->any())<div class="alert alert-error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('sinhvien.update', $student['id']) }}">@csrf @method('PUT') @include('sinhvien.form', ['student' => $student])<div class="form-actions"><button class="btn" type="submit">Cập nhật</button><a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">Hủy</a></div></form>
    </section>
@endsection
