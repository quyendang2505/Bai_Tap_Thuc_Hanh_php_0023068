@extends('sinhvien.layout1')

@section('title', 'Quản lý lớp học')

@section('content')
    <div class="page-header">
        <div>
            <h1>Danh sách lớp học</h1>
            <p>Quản lý thông tin lớp, giáo viên chủ nhiệm và sĩ số.</p>
        </div>
        <a href="{{ route('lophoc.create') }}" class="btn">+ Thêm lớp học</a>
    </div>

    <section class="card">
        <form method="GET" action="{{ route('lophoc.index') }}" class="filter-bar">
            <input type="search" name="search" value="{{ request('search') }}" placeholder="Tìm mã lớp, tên lớp, giáo viên...">
            <select name="trang_thai">
                <option value="">Tất cả trạng thái</option>
                <option value="1" @selected(request('trang_thai') === '1')>Hoạt động</option>
                <option value="0" @selected(request('trang_thai') === '0')>Ngưng hoạt động</option>
            </select>
            <select name="sort_by">
                <option value="id" @selected($sortBy === 'id')>Sắp xếp theo ID</option>
                <option value="ma_lop" @selected($sortBy === 'ma_lop')>Mã lớp</option>
                <option value="ten_lop" @selected($sortBy === 'ten_lop')>Tên lớp</option>
                <option value="giao_vien" @selected($sortBy === 'giao_vien')>Giáo viên</option>
                <option value="si_so" @selected($sortBy === 'si_so')>Sĩ số</option>
            </select>
            <select name="sort_direction">
                <option value="asc" @selected($sortDirection === 'asc')>Tăng dần</option>
                <option value="desc" @selected($sortDirection === 'desc')>Giảm dần</option>
            </select>
            <select name="per_page">
                @foreach ([10, 20, 50] as $size)
                    <option value="{{ $size }}" @selected($perPage === $size)>{{ $size }} dòng</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Lọc</button>
        </form>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Mã lớp</th><th>Tên lớp</th><th>Giáo viên</th>
                        <th>Điện thoại</th><th>Ghi chú</th><th>Sĩ số</th><th>Trạng thái</th><th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lophocs as $lop)
                        <tr>
                            <td>{{ $lop->id }}</td>
                            <td><strong>{{ $lop->ma_lop }}</strong></td>
                            <td>{{ $lop->ten_lop }}</td>
                            <td>{{ $lop->giao_vien }}</td>
                            <td>{{ $lop->so_dien_thoai_gvcn ?: '—' }}</td>
                            <td class="note-cell" title="{{ $lop->ghi_chu }}">{{ $lop->ghi_chu ?: '—' }}</td>
                            <td>{{ $lop->si_so }}</td>
                            <td><span class="badge {{ $lop->trang_thai ? 'badge-success' : 'badge-muted' }}">{{ $lop->trang_thai ? 'Hoạt động' : 'Tạm ngưng' }}</span></td>
                            <td>
                                <div class="action-cell">
                                    <a href="{{ route('lophoc.edit', $lop) }}" class="btn btn-secondary btn-sm">Sửa</a>
                                    <form action="{{ route('lophoc.destroy', $lop) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa lớp học này?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="empty-state">Chưa có lớp học phù hợp.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $lophocs->links('pagination.custom') }}
    </section>
@endsection
