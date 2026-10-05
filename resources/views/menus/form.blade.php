@if ($errors->any()) <div class="error"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
<form method="POST" action="{{ $action }}" style="margin-top:15px">
    @csrf @if ($method !== 'POST') @method($method) @endif
    <div class="form-group"><label for="slug">Slug</label><input id="slug" name="slug" value="{{ old('slug', $menu?->slug) }}" required></div>
    <div class="form-group"><label for="tenhienthi">Tên hiển thị</label><input id="tenhienthi" name="tenhienthi" value="{{ old('tenhienthi', $menu?->tenhienthi) }}" required></div>
    <div class="form-group"><label><input type="checkbox" name="trangthai" value="1" @checked(old('trangthai', $menu?->trangthai ?? true))> Hoạt động</label></div>
    <button type="submit" class="btn">Lưu</button>
</form>
