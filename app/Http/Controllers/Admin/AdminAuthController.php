<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    //
    function login(): View
    {
        return view('admin.auth.login');
    }

    function PasswordRequest(): View
    {
        return view('admin.auth.forgot-password');
    }
}