@extends('sinhvien.layout1')

@section('content')
    <h1>Chi tiết sinh viên</h1>
    <p>ID: {{ $sinhvien['id'] }}</p>
    <p>Mã sinh viên: {{ $sinhvien['student_id'] }}</p>
    <p>Tên: {{ $sinhvien['name'] }}</p>
    <p>Ngày sinh: {{ $sinhvien['birthday'] }}</p>
    <p>Địa chỉ: {{ $sinhvien['address'] }}</p>
@endsection
