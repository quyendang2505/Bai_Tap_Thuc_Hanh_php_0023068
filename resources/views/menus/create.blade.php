@extends('sinhvien.layout1')
@section('content')
<h1>Thêm menu</h1>
<a href="{{ route('menu.index') }}">Danh sách menu</a>
@include('menus.form', ['menu' => null, 'action' => route('menu.store'), 'method' => 'POST'])
@endsection
