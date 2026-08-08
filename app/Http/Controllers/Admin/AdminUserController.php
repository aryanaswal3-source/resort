<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::query()
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");

                });

            })
            ->latest()
            ->get();

        return view('admin.users', compact('users', 'search'));
    }

    public function show(User $user)
    {
        return view('admin.user-details', compact('user'));
    }

    public function destroy(User $user)
    {
        // Admin account cannot be deleted
        if ($user->role === 'admin') {

            return back()->with(
                'error',
                'Admin account cannot be deleted.'
            );

        }

        $user->delete();

        return back()->with(
            'success',
            'User deleted successfully.'
        );
    }
}
