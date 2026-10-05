<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
</style>

@extends('sinhvien.layout1')

@section('content')
    <h1>Danh sách sinh viên</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhvien as $sv)
                <tr>
                    <td>{{ $sv['id'] }}</td>
                    <td>{{ $sv['student_id'] }}</td>
                    <td>{{ $sv['name'] }}</td>
                    <td>{{ $sv['birthday'] }}</td>
                    <td>{{ $sv['address'] }}</td>
                    <td>
                        <a href="{{ route('sinhvien.edit', $sv['id']) }}">Chỉnh sửa</a>
                        <form action="{{ route('sinhvien.destroy', $sv['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection