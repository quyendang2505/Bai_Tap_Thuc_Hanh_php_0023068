<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SinhVienController extends Controller
{
    private array $defaultStudents = [
        ['id' => 1, 'student_id' => 'SV001', 'name' => 'Nguyen Van A', 'birthday' => '2000-01-01', 'address' => 'Hanoi'],
        ['id' => 2, 'student_id' => 'SV002', 'name' => 'Nguyen Van B', 'birthday' => '2000-02-02', 'address' => 'HCM'],
        ['id' => 3, 'student_id' => 'SV003', 'name' => 'Nguyen Van C', 'birthday' => '2000-03-03', 'address' => 'Da Lat'],
    ];

    public function index(Request $request): View
    {
        return view('sinhvien.index', [
            'title' => 'Danh sách sinh viên',
            'sinhvien' => $this->students($request),
        ]);
    }

    public function show(string $hoten = 'Chưa có tên', int $tuoi = 0): string
    {
        return "Tên sinh viên: {$hoten}, Tuổi: {$tuoi}";
    }

    public function getID(Request $request, int|string $id = ''): string
    {
        $student = collect($this->students($request))->firstWhere('id', (int) $id);

        return $student
            ? "Tên sinh viên: {$student['name']}, Ngày sinh: {$student['birthday']}, Địa chỉ: {$student['address']}"
            : "Không tìm thấy sinh viên với ID: {$id}";
    }

    public function add(): View
    {
        return view('sinhvien.add');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateStudent($request);
        $students = $this->students($request);

        $this->ensureStudentCodeIsUnique($students, $validated['student_id']);

        $validated['id'] = empty($students) ? 1 : max(array_column($students, 'id')) + 1;
        $students[] = $validated;
        $request->session()->put('students', $students);

        return redirect()->route('sinhvien.index')->with('success', 'Thêm sinh viên thành công.');
    }

    public function edit(Request $request, int $id): View
    {
        $student = $this->findStudent($request, $id);

        return view('sinhvien.edit', compact('student'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $this->validateStudent($request);
        $students = $this->students($request);
        $this->findStudent($request, $id);
        $this->ensureStudentCodeIsUnique($students, $validated['student_id'], $id);

        foreach ($students as &$student) {
            if ($student['id'] === $id) {
                $student = array_merge($student, $validated);
                break;
            }
        }

        $request->session()->put('students', $students);

        return redirect()->route('sinhvien.index')->with('success', 'Cập nhật sinh viên thành công.');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $this->findStudent($request, $id);
        $students = array_values(array_filter(
            $this->students($request),
            fn (array $student): bool => $student['id'] !== $id,
        ));
        $request->session()->put('students', $students);

        return redirect()->route('sinhvien.index')->with('success', 'Xóa sinh viên thành công.');
    }

    private function students(Request $request): array
    {
        if (!$request->session()->has('students')) {
            $request->session()->put('students', $this->defaultStudents);
        }

        return $request->session()->get('students', []);
    }

    private function findStudent(Request $request, int $id): array
    {
        $student = collect($this->students($request))->firstWhere('id', $id);
        abort_if($student === null, 404, 'Không tìm thấy sinh viên.');

        return $student;
    }

    private function validateStudent(Request $request): array
    {
        return $request->validate([
            'student_id' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:100'],
            'birthday' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    private function ensureStudentCodeIsUnique(array $students, string $studentId, ?int $exceptId = null): void
    {
        $exists = collect($students)->contains(
            fn (array $student): bool => $student['student_id'] === $studentId && $student['id'] !== $exceptId,
        );

        if ($exists) {
            throw ValidationException::withMessages(['student_id' => 'Mã sinh viên đã tồn tại.']);
        }
    }
}
