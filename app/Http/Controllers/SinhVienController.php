<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    //
    private $sinhvien = [
        ['id' => 1, 'student_id' => 'SV001', 'name' => 'Nguyen Van A', 'birthday' => '2000-01-01', 'address' => 'Hanoi'],
        ['id' => 2, 'student_id' => 'SV002', 'name' => 'Nguyen Van B', 'birthday' => '2000-02-02', 'address' => 'HCM'],
        ['id' => 3, 'student_id' => 'SV003', 'name' => 'Nguyen Van C', 'birthday' => '2000-03-03', 'address' => 'Da Lat']
    ];
        
    public function index()
    {

        return view('sinhvien.index', [
            'title' => 'Danh sách sinh viên',
            'sinhvien' => $this->sinhvien,
        ]);
    }

    public function show($hoten = "Chưa có tên", $tuoi = 0)
    {
        return "Tên sinh viên: " . $hoten . ", Tuổi: " . $tuoi;
    }

    public function getID($id="")
    {
        $sinhvien = collect($this->sinhvien)->firstWhere('id', $id);
        if ($sinhvien) {
            return "Tên sinh viên: " . $sinhvien['name'] . ", Ngày sinh: " . $sinhvien['birthday'] . ", Địa chỉ: " . $sinhvien['address'];
        } else {
            return "Không tìm thấy sinh viên với ID: " . $id;
        }
    }

    public function add(){
        return view('sinhvien.add');
    }

    public function store(Request $request){
        dd($request->all());
    }
}   
