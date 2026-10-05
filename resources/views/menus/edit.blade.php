@extends('sinhvien.layout1')
@section('content')
<h1>Chỉnh sửa menu</h1>
<a href="{{ route('menu.index') }}">Danh sách menu</a>
@include('menus.form', ['menu' => $menu, 'action' => route('menu.update', $menu), 'method' => 'PUT'])
@endsection
