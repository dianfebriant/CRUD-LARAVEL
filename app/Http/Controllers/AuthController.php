<?php

namespace App\Http\Controllers;

use Hash;

use Session;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Rules\IsValidPassword;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('/admin');
        }
        return view('auth/login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required', 'string', 'confirmed', new isValidPassword()
        ];
 
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.username'     => 'Username tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string dan integer'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return view('admin.dashboard');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
 
    }
 
    public function showFormRegister()
    {
        return view('auth/register');
    }
 
    public function register(Request $request)
    {
        $rules = [
        'name' => ['required', 'min:3', 'string', 'max:35'],
        'username' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'confirmed', new isValidPassword()],
        ];
 
        $messages = [
            'name.required'         => 'Nama lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'username.required'     => 'Username wajib diisi',
            'username.max'          => 'Username makasimal 255 karakter',
            'username.username'     => 'Username tidak valid',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = ucwords(strtolower($request->username));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
    


 
}
