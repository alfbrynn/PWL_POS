<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('user.profil');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->foto && file_exists(public_path('uploads/' . $user->foto))) {
            File::delete(public_path('uploads/' . $user->foto));
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $namaFile);

        // Update field foto
        $user->foto = $namaFile;
        $user->save();

        return response()->json(['message' => 'Foto profil berhasil diperbarui.']);
    }
}
