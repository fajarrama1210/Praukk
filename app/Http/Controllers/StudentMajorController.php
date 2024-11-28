<?php

namespace App\Http\Controllers;

use App\Models\StudentMajor;
use Illuminate\Http\Request;

class StudentMajorController extends Controller
{
    public function index()
    {
        // Mengambil semua data jurusan
        $majors = StudentMajor::all();
        return view('admin.studentMajor.list', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.studentMajor.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Menyimpan data jurusan baru
        StudentMajor::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.studentMajor.list')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentMajor $studentMajor)
    {
        return view('admin.studentMajor.update', compact('studentMajor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentMajor $studentMajor)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update data jurusan
        $studentMajor->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.studentMajor.list')->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentMajor $studentMajor)
    {
        // Menghapus data jurusan
        $studentMajor->delete();

        return redirect()->route('admin.studentMajor.list')->with('success', 'Jurusan berhasil dihapus.');
    }
}
