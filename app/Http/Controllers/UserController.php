<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenModel;
use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use App\Models\ProgramStudi;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'users';

        return view('admin.users.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function getMahasiswaData()
    {
        $mahasiswas = Mahasiswa::with('programStudi')->get();

        $data = $mahasiswas->map(function ($mhs) {
            return [
                'id' => $mhs->id,
                'nim' => $mhs->nim,
                'nama' => $mhs->nama,
                'username' => $mhs->username,
                'email' => $mhs->email,
                'program_studi' => $mhs->programStudi->nama ?? '-',
            ];
        });

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'mahasiswa');

        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah User']
        ];

        $page = (object)[
            'title' => 'Tambah user baru'
        ];

        $programStudis = ProgramStudi::all();

        $activeMenu = 'users';

        return view('admin.users.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'programStudis' => $programStudis,
            'activeMenu' => $activeMenu,
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $type = $request->input('type');

        if ($type == 'mahasiswa') {
            $request->validate([
                'nim' => 'required|unique:mahasiswa,nim',
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:100',
                'email' => 'required|email|unique:mahasiswa,email',
                'password' => 'required|min:6|confirmed',
                'program_studi' => 'required|exists:program_studi,id_prodi',
                'foto' => 'nullable|image|max:2048',
            ]);

            $password = Hash::make($request->password);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto_mahasiswa'), $filename);
                $fotoPath = 'foto_mahasiswa/' . $filename;
            }

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto_dosen'), $filename);
                $fotoPath = 'foto_dosen/' . $filename;
            }

            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $password,
                'program_studi' => $request->program_studi,
                'foto' => $fotoPath,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
        }

        if ($type == 'dosen') {
            $request->validate([
                'nidn' => 'required|unique:dosen,nidn',
                'username' => 'required|string|max:100',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:dosen,email',
                'password' => 'required|min:6|confirmed',
                'role' => 'required|in:admin,kajur',
                'foto' => 'nullable|image|max:2048',
            ]);

            $password = Hash::make($request->password);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto_dosen'), $filename);
                $fotoPath = 'foto_dosen/' . $filename;
            }

            Dosen::create([
                'nidn' => $request->nidn,
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'foto' => $fotoPath,
                'role' => $request->role,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'Data dosen berhasil ditambahkan!');
        }

        return back()->with('error', 'Tipe user tidak valid')->withInput();
    }


    public function getDosenData()
    {
        $dosens = Dosen::all();

        $data = $dosens->map(function ($dsn) {
            return [
                'id' => $dsn->id,
                'nidn' => $dsn->nidn,
                'nama' => $dsn->nama,
                'username' => $dsn->username,
                'email' => $dsn->email,
                'role' => $dsn->role,
            ];
        });

        return response()->json($data);
    }
}
