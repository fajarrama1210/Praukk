<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreLibraryOfficerRequest;
use App\Http\Requests\UpdateLibraryOfficerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function store(StoreLibraryOfficerRequest $request)
    {
        $data = $request->validated();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos');
        }

        // Hash password
        $data['password'] = Hash::make($request->password);

        // Create new user
        $officer = User::create($data);
        $officer->assignRole('library_officer');

        return redirect()->route('admin.libraryOfficer.list');
    }

    public function edit(User $user)
    {
        return view('admin.libraryOfficer.update', compact('user'));
    }

    public function update(UpdateLibraryOfficerRequest $request, User $user)
    {
        $data = $request->validated();

        // Handle photo upload if exists
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos');
        }

        // Update password if provided
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update user data
        $user->update($data);

        return redirect()->route('admin.libraryOfficer.list');
    }

    public function destroy(User $user)
    {
        // Delete the photo if exists
        if ($user->photo) {
            Storage::delete($user->photo);
        }

        $user->delete();

        return redirect()->route('admin.libraryOfficer.list');
    }
}
