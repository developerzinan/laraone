<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('about', [
            'heading' => 'About Us',
            'body' => 'This is the about page content.'
        ]);
    }

    public function user(int $id)
    {
        $user = User::findOrFail($id);
//        $user = DB::table('users')->find($id);

        return view('profile', compact('user'));
    }
}
