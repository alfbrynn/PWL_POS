<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() 
    { 
        if(Auth::check()){ // jika sudah login, maka redirect ke halaman home 
            return redirect('/'); 
        } 
        return view('auth.login'); 
    } 
 
    public function postlogin(Request $request) 
    { 
        if($request->ajax() || $request->wantsJson()){ 
            $credentials = $request->only('username', 'password'); 
 
            if (Auth::attempt($credentials)) { 
                return response()->json([ 
                    'status' => true, 
                    'message' => 'Login Berhasil', 
                    'redirect' => url('/') 
                ]); 
            } 
             
            return response()->json([ 
                'status' => false, 
                'message' => 'Login Gagal' 
            ]); 
        } 
 
        return redirect('login'); 
    } 
 
    public function logout(Request $request) 
    { 
        Auth::logout(); 
 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();     
        return redirect('login'); 
    } 

    public function showRegisterForm()
    {
        return view('auth.register_ajax');
    }

    public function registerAjax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validator = Validator::make($request->all(), [
                'level_id' => 'required|integer|exists:m_level,level_id',
                'username' => 'required|string|min:4|max:50|unique:m_user,username',
                'nama'     => 'required|string|min:3|max:100',
                'password' => 'required|string|min:6|confirmed'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            UserModel::create([
                'level_id' => $request->level_id,
                'username' => $request->username,
                'nama'     => $request->nama,
                'password' => $request->password,
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Registrasi berhasil, silakan login',
                'redirect' => url('/login')
            ]);
        }

        return redirect('/register');
    }
}
