<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        // Menampilkan daftar kelas
        $studentClasses = StudentClass::all();
        return view('admin.studentClass.list', compact('studentClasses'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah kelas
        return view('admin.studentClass.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        StudentClass::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.studentClass.list')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(StudentClass $studentClass)
    {
        // Menampilkan form untuk mengedit kelas
        return view('admin.studentClass.update', compact('studentClass'));
    }

    public function update(Request $request, StudentClass $studentClass)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $studentClass->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.studentClass.list')->with('success', 'Kelas berhasil diperbarui');
    }
        public function destroy(StudentClass $studentClass)
    {
        // Menghapus kelas
        $studentClass->delete();

        return redirect()->route('admin.studentClass.list')->with('success', 'Kelas berhasil dihapus');
    }
}
