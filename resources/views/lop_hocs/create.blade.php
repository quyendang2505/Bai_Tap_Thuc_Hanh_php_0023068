<style>
.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group textarea {
  width: 100%;
  max-width: 400px;
  padding: 8px;
  box-sizing: border-box;
}

.error {
  color: red;
  font-size: 0.9em;
}

.btn {
  padding: 8px 16px;
  background-color: #04AA6D;
  color: white;
  border: none;
  cursor: pointer;
}
</style>

@extends('sinhvien.layout1')

@section('content')
    <h1>Thêm lớp học</h1>

    <a href="{{ route('lophoc.index') }}" class="btn" style="display:inline-block; text-decoration:none; margin-bottom:15px;">Danh sách lớp học</a>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('lophoc.store') }}">
        @csrf

        <div class="form-group">
            <label for="ma_lop">Mã lớp</label>
            <input type="text" id="ma_lop" name="ma_lop" value="{{ old('ma_lop') }}">
        </div>

        <div class="form-group">
            <label for="ten_lop">Tên lớp</label>
            <input type="text" id="ten_lop" name="ten_lop" value="{{ old('ten_lop') }}">
        </div>

        <div class="form-group">
            <label for="giao_vien">Giáo viên</label>
            <input type="text" id="giao_vien" name="giao_vien" value="{{ old('giao_vien') }}">
        </div>

        <div class="form-group">
            <label for="so_dien_thoai_gvcn">Số điện thoại GVCN</label>
            <input type="text" id="so_dien_thoai_gvcn" name="so_dien_thoai_gvcn" value="{{ old('so_dien_thoai_gvcn') }}">
        </div>

        <div class="form-group">
            <label for="si_so">Sĩ số</label>
            <input type="number" id="si_so" name="si_so" value="{{ old('si_so') }}">
        </div>

        <div class="form-group">
            <label for="ghi_chu">Ghi chú</label>
            <textarea id="ghi_chu" name="ghi_chu">{{ old('ghi_chu') }}</textarea>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="trang_thai" value="1" {{ old('trang_thai', true) ? 'checked' : '' }}>
                Hoạt động
            </label>
        </div>

        <button type="submit" class="btn">Lưu</button>
    </form>
@endsection
