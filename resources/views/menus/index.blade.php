@extends('sinhvien.layout1')

@section('content')
    <h1>Quản lý menu</h1>
    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    <a href="{{ route('menu.create') }}" class="btn" style="display:inline-block; text-decoration:none; margin-bottom:15px;">Thêm menu</a>
    <table>
        <thead><tr><th>ID</th><th>Slug</th><th>Tên hiển thị</th><th>Trạng thái</th><th>Hành động</th></tr></thead>
        <tbody>
        @forelse ($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td><td>{{ $menu->slug }}</td><td>{{ $menu->tenhienthi }}</td>
                <td>{{ $menu->trangthai ? 'Hoạt động' : 'Ngưng hoạt động' }}</td>
                <td><div class="action-cell">
                    <a href="{{ route('menu.edit', $menu) }}" class="btn-edit">Chỉnh sửa</a>
                    <form action="{{ route('menu.destroy', $menu) }}" method="POST">@csrf @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa menu này?')">Xóa</button>
                    </form>
                </div></td>
            </tr>
        @empty <tr><td colspan="5">Chưa có menu.</td></tr> @endforelse
        </tbody>
    </table>
    {{ $menus->links('pagination.custom') }}
@endsection
