<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.role.list', compact('users'));
    }
}
