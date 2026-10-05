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

.btn {
  padding: 8px 16px;
  background-color: #04AA6D;
  color: white;
  border: none;
  cursor: pointer;
}

.action-cell {
  display: flex;
  gap: 8px;
}

.btn-edit,
.btn-delete {
  display: inline-block;
  padding: 6px 12px;
  border: none;
  border-radius: 4px;
  color: white;
  font-size: 0.9em;
  cursor: pointer;
  text-decoration: none;
}

.btn-edit {
  background-color: #3498db;
}

.btn-edit:hover {
  background-color: #2980b9;
}

.btn-delete {
  background-color: #e74c3c;
}

.btn-delete:hover {
  background-color: #c0392b;
}
</style>

@extends('sinhvien.layout1')

@section('content')
    <h1>Danh sách lớp học</h1>

    <a href="{{ route('lophoc.create') }}" class="btn" style="display:inline-block; text-decoration:none; margin-bottom:15px;">Thêm lớp học</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Giáo viên</th>
                <th>Số điện thoại GVCN</th>
                <th>Ghi chú</th>
                <th>Sĩ số</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lophocs as $lop)
                <tr>
                    <td>{{ $lop['id'] }}</td>
                    <td>{{ $lop['ma_lop'] }}</td>
                    <td>{{ $lop['ten_lop'] }}</td>
                    <td>{{ $lop['giao_vien'] }}</td>
                    <td>{{ $lop['so_dien_thoai_gvcn'] }}</td>
                    <td>{{ $lop['ghi_chu'] }}</td>
                    <td>{{ $lop['si_so'] }}</td>
                    <td>{{ $lop['trang_thai'] ? 'Hoạt động' : 'Ngưng hoạt động' }}</td>
                    <td>
                        <div class="action-cell">
                            <a href="{{ route('lophoc.edit', $lop['id']) }}" class="btn-edit">Chỉnh sửa</a>
                            <form action="{{ route('lophoc.destroy', $lop['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này?')">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <select onchange="window.location.href = '{{ url()->current() }}?per_page=' + this.value">
        <option value="10" @selected($perPage == 10)>10</option>
        <option value="20" @selected($perPage == 20)>20</option>
        <option value="50" @selected($perPage == 50)>50</option>
    </select>
    {{ $lophocs->links('pagination.custom') }}

@endsection