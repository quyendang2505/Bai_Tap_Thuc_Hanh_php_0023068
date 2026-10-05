<?php

namespace Database\Seeders;

use App\Models\LopHoc;
use Illuminate\Database\Seeder;

class LopHocSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LopHoc::factory()->count(20)->create();
        LopHoc::factory()->create([
            'ten_lop' => 'Lớp 1A',
            'ma_lop' => 'LA001',
            'giao_vien' => 'Nguyễn Văn A',
            'so_dien_thoai_gvcn' => '0123456789',
            'ghi_chu' => 'Lớp học cơ bản',
            'si_so' => 30,
            'trang_thai' => true,
        ]);
    }
}
