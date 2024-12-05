<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User di-import
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LibraryOfficerController extends Controller
{
    public function index()
    {
        $officers = User::role('officer')->get();
        return view('admin.libraryOfficer.list', compact('officers'));
    }

    public function create()
    {
        return view('admin.libraryOfficer.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $photoPath,
        ]);

        // Assign role officer
        $role = Role::where('name', 'officer')->first();
        $user->assignRole($role);

        return redirect()->route('admin.libraryOfficer.list')->with('success', 'Berhasil Menambahkan Petugas.');
    }
    public function show(User $user)
    {
        return view('admin.libraryOfficer.detail', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.libraryOfficer.update', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.libraryOfficer.list')->with('success', 'Berhasil Update Petugas.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.libraryOfficer.list')->with('success', 'Berhasl Menghaspus Petugas.');
    }
}
