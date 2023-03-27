<?php

namespace App\Http\Controllers\Office;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
// use App\Mail\Office\WelcomeMail;
use Exception;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }
    public function index()
    {
        return view('page.office.auth.main');
    }
    // Fungsi Autentikasi
    public function do_login(Request $request)
    {
        // 
        $datas=$request->only('email','password','role');
        // 
        if(Auth::attempt($datas)){
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang '. Auth::user()->name,
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, email atau password anda salah, silahkan coba lagi.',
            ]);
        }
    }
    
    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('office.auth');
    }
}

