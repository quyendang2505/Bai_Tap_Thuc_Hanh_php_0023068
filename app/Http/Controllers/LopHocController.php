<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10);
        $perPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;

        $sortBy = $request->string('sort_by')->toString();
        $sortBy = in_array($sortBy, ['id', 'ma_lop', 'ten_lop', 'giao_vien', 'si_so', 'trang_thai']) ? $sortBy : 'id';
        $sortDirection = $request->string('sort_direction')->toString() === 'desc' ? 'desc' : 'asc';

        $query = LopHoc::query();

        if ($request->filled('search')) {
            $search = $request->string('search')->toString();
            $query->where(function ($query) use ($search) {
                $query->where('ma_lop', 'like', "%{$search}%")
                    ->orWhere('ten_lop', 'like', "%{$search}%")
                    ->orWhere('giao_vien', 'like', "%{$search}%");
            });
        }

        if ($request->filled('trang_thai') && in_array($request->input('trang_thai'), ['0', '1'], true)) {
            $query->where('trang_thai', $request->input('trang_thai'));
        }

        $lophocs = $query->orderBy($sortBy, $sortDirection)->paginate($perPage)->withQueryString();

        return view('lop_hocs.index', compact('lophocs', 'perPage', 'sortBy', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lop_hocs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_lop' => ['required', 'string', 'max:255'],
            'ma_lop' => ['required', 'string', 'max:255', 'unique:lop_hocs,ma_lop'],
            'giao_vien' => ['required', 'string', 'max:255'],
            'so_dien_thoai_gvcn' => ['nullable', 'string', 'max:20'],
            'ghi_chu' => ['nullable', 'string'],
            'si_so' => ['required', 'integer', 'min:0'],
            'trang_thai' => ['nullable', 'boolean'],
        ]);

        $validated['trang_thai'] = $request->boolean('trang_thai');

        LopHoc::create($validated);

        return redirect()->route('lophoc.index')->with('success', 'Thêm lớp học thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LopHoc $lopHoc)
    {
        return view('lop_hocs.edit', compact('lopHoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LopHoc $lopHoc)
    {
        $validated = $request->validate([
            'ten_lop' => ['required', 'string', 'max:255'],
            'ma_lop' => ['required', 'string', 'max:255', 'unique:lop_hocs,ma_lop,' . $lopHoc->id],
            'giao_vien' => ['required', 'string', 'max:255'],
            'so_dien_thoai_gvcn' => ['nullable', 'string', 'max:20'],
            'ghi_chu' => ['nullable', 'string'],
            'si_so' => ['required', 'integer', 'min:0'],
            'trang_thai' => ['nullable', 'boolean'],
        ]);

        $validated['trang_thai'] = $request->boolean('trang_thai');

        $lopHoc->update($validated);

        return redirect()->route('lophoc.index')->with('success', 'Cập nhật lớp học thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LopHoc $lopHoc)
    {
        $lopHoc->delete();

        return redirect()->route('lophoc.index')->with('success', 'Xóa lớp học thành công.');
    }
}
