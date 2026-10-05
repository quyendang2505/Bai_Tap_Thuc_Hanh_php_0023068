<div class="form-grid">
    <div class="form-group"><label for="student_id">Mã sinh viên</label><input id="student_id" name="student_id" required value="{{ old('student_id', $student['student_id'] ?? '') }}"></div>
    <div class="form-group"><label for="name">Tên sinh viên</label><input id="name" name="name" required value="{{ old('name', $student['name'] ?? '') }}"></div>
    <div class="form-group"><label for="birthday">Ngày sinh</label><input type="date" id="birthday" name="birthday" required value="{{ old('birthday', $student['birthday'] ?? '') }}"></div>
    <div class="form-group"><label for="address">Địa chỉ</label><input id="address" name="address" required value="{{ old('address', $student['address'] ?? '') }}"></div>
</div>
