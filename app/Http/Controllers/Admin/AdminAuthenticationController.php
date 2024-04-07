<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\HandleLoginRequest;
use App\Http\Requests\SendResetEmailLink;
use App\Mail\AdminSendResetEmailLink;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminAuthenticationController extends Controller
{
    function login(): View
    {
        return view('admin.auth.login');
    }

    function handleLogin(HandleLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('admin.dashboard');
    }

    function forgotPassword(): View
    {
        return view('admin.auth.forgot-password');
    }

    function sendResetLinkEmail(SendResetEmailLink $request): RedirectResponse
    {

        $token = \Illuminate\Support\Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($admin->email)->send(new AdminSendResetEmailLink($token, $request->email));

        return redirect()->back()->with('success', __('admin.Reset link sent to your email'));
    }

    function resetPassword($token)
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    function handleResetPassword(AdminResetPasswordRequest $request)
    {
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if (!$admin) {
            return redirect()->back()->with('error', __('admin.Invalid token'));
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', __('admin.Password reset successfully'));
    }

    function logout(Request $request): RedirectResponse
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
