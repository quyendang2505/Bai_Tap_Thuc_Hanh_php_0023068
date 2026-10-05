<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::orderBy('id')->paginate(10)->withQueryString();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:menus,slug'],
            'tenhienthi' => ['required', 'string', 'max:255'],
            'trangthai' => ['nullable', 'boolean'],
        ]);
        $validated['trangthai'] = $request->boolean('trangthai');
        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Thêm menu thành công.');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:menus,slug,' . $menu->id],
            'tenhienthi' => ['required', 'string', 'max:255'],
            'trangthai' => ['nullable', 'boolean'],
        ]);
        $validated['trangthai'] = $request->boolean('trangthai');
        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Cập nhật menu thành công.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Xóa menu thành công.');
    }
}
