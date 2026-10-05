<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();

        // Hitung Statistik Murid
        $totalMurid = Student::count();
        $totalLaki  = Student::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Student::where('jenis_kelamin', 'Perempuan')->count();

        return view('students.index', compact('students', 'totalMurid', 'totalLaki', 'totalPerempuan'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_murid'     => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir'  => 'required|date',
            'foto_murid'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_ortu'      => 'required|string|max:255',
            'hp_ortu'        => 'required|string|max:20',
            'pekerjaan_ortu' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_murid')) {
            $data['foto_murid'] = $request->file('foto_murid')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Data murid berhasil ditambahkan!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama_murid'     => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir'  => 'required|date',
            'foto_murid'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_ortu'      => 'required|string|max:255',
            'hp_ortu'        => 'required|string|max:20',
            'pekerjaan_ortu' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_murid')) {
            if ($student->foto_murid && Storage::disk('public')->exists($student->foto_murid)) {
                Storage::disk('public')->delete($student->foto_murid);
            }
            $data['foto_murid'] = $request->file('foto_murid')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Data murid berhasil diperbarui!');
    }

    public function destroy(Student $student)
    {
        if ($student->foto_murid && Storage::disk('public')->exists($student->foto_murid)) {
            Storage::disk('public')->delete($student->foto_murid);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data murid berhasil dihapus!');
    }
}