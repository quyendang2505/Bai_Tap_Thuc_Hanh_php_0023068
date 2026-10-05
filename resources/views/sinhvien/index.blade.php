@extends('sinhvien.layout1')

@section('title', 'Danh sách sinh viên')

@section('content')
    <div class="page-header">
        <div><h1>Danh sách sinh viên</h1><p>Quản lý thông tin sinh viên trong hệ thống.</p></div>
        <a href="{{ route('sinhvien.create') }}" class="btn">+ Thêm sinh viên</a>
    </div>

    <section class="card">
        <div class="table-wrap">
            <table>
                <thead><tr><th>ID</th><th>Mã sinh viên</th><th>Tên sinh viên</th><th>Ngày sinh</th><th>Địa chỉ</th><th>Hành động</th></tr></thead>
                <tbody>
                    @forelse ($sinhvien as $sv)
                        <tr>
                            <td>{{ $sv['id'] }}</td><td><strong>{{ $sv['student_id'] }}</strong></td><td>{{ $sv['name'] }}</td><td>{{ $sv['birthday'] }}</td><td>{{ $sv['address'] }}</td>
                            <td><div class="action-cell"><a class="btn btn-secondary btn-sm" href="{{ route('sinhvien.edit', $sv['id']) }}">Sửa</a><form action="{{ route('sinhvien.destroy', $sv['id']) }}" method="POST">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">Xóa</button></form></div></td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="empty-state">Chưa có sinh viên.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
