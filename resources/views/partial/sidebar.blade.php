
<aside class="sidebar">
    <h3>Điều hướng</h3>
    <ul>
        <li><a class="{{ request()->routeIs('lophoc.*') ? 'active' : '' }}" href="{{ route('lophoc.index') }}">Lớp học</a></li>
        <li><a class="{{ request()->routeIs('sinhvien.*') ? 'active' : '' }}" href="{{ route('sinhvien.index') }}">Sinh viên</a></li>
        <li><a class="{{ request()->routeIs('menu.*') ? 'active' : '' }}" href="{{ route('menu.index') }}">Quản lý menu</a></li>
    </ul>
</aside>
