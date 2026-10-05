<div class="form-grid">
    <div class="form-group"><label for="ma_lop">Mã lớp</label><input id="ma_lop" name="ma_lop" required value="{{ old('ma_lop', $lopHoc?->ma_lop) }}"></div>
    <div class="form-group"><label for="ten_lop">Tên lớp</label><input id="ten_lop" name="ten_lop" required value="{{ old('ten_lop', $lopHoc?->ten_lop) }}"></div>
    <div class="form-group"><label for="giao_vien">Giáo viên chủ nhiệm</label><input id="giao_vien" name="giao_vien" required value="{{ old('giao_vien', $lopHoc?->giao_vien) }}"></div>
    <div class="form-group"><label for="so_dien_thoai_gvcn">Số điện thoại GVCN</label><input id="so_dien_thoai_gvcn" name="so_dien_thoai_gvcn" value="{{ old('so_dien_thoai_gvcn', $lopHoc?->so_dien_thoai_gvcn) }}"></div>
    <div class="form-group"><label for="si_so">Sĩ số</label><input type="number" min="0" id="si_so" name="si_so" required value="{{ old('si_so', $lopHoc?->si_so ?? 0) }}"></div>
    <div class="form-group"><label>Trạng thái</label><label class="checkbox-row"><input type="checkbox" name="trang_thai" value="1" @checked(old('trang_thai', $lopHoc?->trang_thai ?? true))> Đang hoạt động</label></div>
    <div class="form-group full"><label for="ghi_chu">Ghi chú</label><textarea id="ghi_chu" name="ghi_chu">{{ old('ghi_chu', $lopHoc?->ghi_chu) }}</textarea></div>
</div>
