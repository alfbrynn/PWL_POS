<?php

namespace App\Http\Controllers;

use App\Models\SuplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SuplierController extends Controller
{
    // Menampilkan halaman daftar suplier
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Suplier',
            'list' => ['Home', 'Suplier']
        ];

        $page = (object) [
            'title' => 'Daftar suplier yang tersedia dalam sistem'
        ];

        $activeMenu = 'suplier'; // set menu yang sedang aktif

        return view('suplier.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data suplier dalam bentuk JSON untuk DataTables
    public function list()
    {
        $supliers = SuplierModel::select('suplier_id', 'nama_suplier', 'alamat_suplier', 'kontak_suplier', 'created_at', 'updated_at');

        return DataTables::of($supliers)
            ->addIndexColumn()
            ->addColumn('aksi', function ($suplier) {
                // $btn  = '<a href="'.url('/suplier/' . $suplier->suplier_id).'" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="'.url('/suplier/' . $suplier->suplier_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="'. url('/suplier/'.$suplier->suplier_id).'">'
                //         . csrf_field() . method_field('DELETE') .  
                //         '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';      
                $btn  = '<button onclick="modalAction(\''.url('/suplier/' . $suplier->suplier_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> '; 
                $btn .= '<button onclick="modalAction(\''.url('/suplier/' . $suplier->suplier_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> '; 
                $btn .= '<button onclick="modalAction(\''.url('/suplier/' . $suplier->suplier_id . '/delete_ajax').'\')"  class="btn btn-danger btn-sm">Hapus</button> '; 
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman tambah suplier
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Suplier',
            'list' => ['Home', 'Suplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah suplier baru'
        ];

        $activeMenu = 'suplier'; // set menu yang sedang aktif

        return view('suplier.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data suplier baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier' => 'required|string|max:100',
            'alamat_suplier' => 'required|string',
            'kontak_suplier' => 'required|string|max:20|unique:m_suplier,kontak_suplier',
        ]);

        SuplierModel::create([
            'nama_suplier' => $request->nama_suplier,
            'alamat_suplier' => $request->alamat_suplier,
            'kontak_suplier' => $request->kontak_suplier,
        ]);

        return redirect('/suplier')->with('success', 'Data suplier berhasil disimpan');
    }

    // Menampilkan detail suplier
    public function show(string $id)
    {
        $suplier = SuplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Suplier',
            'list' => ['Home', 'Suplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail suplier'
        ];

        $activeMenu = 'suplier'; // set menu yang sedang aktif

        return view('suplier.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'suplier' => $suplier, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan halaman form Edit suplier
    public function edit(string $id)
    {
        $suplier = SuplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Suplier',
            'list' => ['Home', 'Suplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit suplier'
        ];

        $activeMenu = 'suplier'; // set menu yang sedang aktif

        return view('suplier.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'suplier' => $suplier, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data suplier
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_suplier' => 'required|string|max:100',
            'alamat_suplier' => 'required|string',
            'kontak_suplier' => 'required|string|max:20|unique:m_suplier,kontak_suplier,' . $id . ',suplier_id',
        ]);

        $suplier = SuplierModel::findOrFail($id);
        $suplier->update([
            'nama_suplier' => $request->nama_suplier,
            'alamat_suplier' => $request->alamat_suplier,
            'kontak_suplier' => $request->kontak_suplier,
        ]);

        return redirect('/suplier')->with('success', 'Data suplier berhasil diperbarui');
    }

    // Menghapus data suplier
    public function destroy(string $id)
    {
        $check = SuplierModel::find($id);
        if (!$check) {
            return redirect('/suplier')->with('error', 'Data suplier tidak ditemukan');
        }

        try {
            SuplierModel::destroy($id);
            return redirect('/suplier')->with('success', 'Data suplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/suplier')->with('error', 'Data suplier gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // Tampilkan form create (via ajax)
    public function create_ajax()
    {
        return view('suplier.create_ajax');
    }

    // Simpan data baru (ajax)
    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_suplier' => 'required|string|max:100',
            'alamat_suplier' => 'required|string',
            'kontak_suplier' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        SuplierModel::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data suplier berhasil disimpan'
        ]);
    }

    // Tampilkan form edit (via ajax)
    public function edit_ajax($id)
    {
        $suplier = SuplierModel::find($id);
        return view('suplier.edit_ajax', compact('suplier'));
    }

    // Update data suplier (ajax)
    public function update_ajax(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_suplier' => 'required|string|max:100',
            'alamat_suplier' => 'required|string',
            'kontak_suplier' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $suplier = SuplierModel::find($id);
        if ($suplier) {
            $suplier->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'
        ]);
    }

    // Tampilkan konfirmasi hapus (via ajax)
    public function confirm_ajax($id)
    {
        $suplier = SuplierModel::find($id);
        return view('suplier.confirm_ajax', compact('suplier'));
    }

    // Hapus data (ajax)
    public function delete_ajax(Request $request, $id)
    {
        $suplier = SuplierModel::find($id);
        if ($suplier) {
            $suplier->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'
        ]);
    }
}
