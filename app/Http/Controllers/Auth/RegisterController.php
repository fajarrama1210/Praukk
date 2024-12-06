<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login'; // Ubah ke '/login'

    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $classes = StudentClass::all();
        $majors = StudentMajor::all();
        return view('auth.register', compact('classes', 'majors'));
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'class_id' => ['required', 'exists:student_classes,id'],
            'major_id' => ['required', 'exists:student_majors,id'],
        ]);
    }

    protected function create(array $data)
    {
        $photoPath = null;
        $userRole = Role::firstOrCreate(['name' => 'user']);

        if (isset($data['photo'])) {
            $photoPath = $data['photo']->store('photos', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'nisn' => $data['nisn'],
            'email' => $data['email'],
            'class_id' => $data['class_id'],
            'major_id' => $data['major_id'],
            'password' => Hash::make($data['password']),
            'photo' => $photoPath,
        ]);

        $user->assignRole($userRole);

        // Pastikan fungsi mengembalikan user
        return $user;
    }
}
