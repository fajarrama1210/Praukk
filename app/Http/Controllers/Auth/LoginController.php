<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Override the authenticated method to redirect based on user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Cek role pengguna dan arahkan ke halaman sesuai
        if ($user->role == 'admin') {
            return redirect()->route('adminDashboard');
        }

        if ($user->role == 'officer') {
            return redirect()->route('officerDashboard');
        }

        if ($user->role == 'user') {
            return redirect()->route('home.index');
        }

        // Jika role tidak dikenal, arahkan ke halaman utama
        return redirect('/');
    }
}
