<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $title = 'login Sistem';
    protected $menu = 'Login';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->menu,
            'label' => 'login',
        ];
        return view('login.login')->with($data);
    }

    public function logout(Request $request)
    {
        User::where(['id' => Auth::user()->id])->update([
            'date_login' => null,
            'date_logout' => Carbon::now(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'aktif' => '0',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->roles == 'Administrator') {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else if (Auth::user()->roles == 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else if (Auth::user()->roles == 'Customer') {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('loginError', 'Login Fail!');
            }
        }
        return back()->with('loginError', 'Login Fail!');
    }

    public function pengaduan(Request $request)
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->menu,
            'level' => $this->menu,
            'label' => 'pengaduan',
        ];
        return view('pengaduan.pengaduan')->with($data);
    }
}
