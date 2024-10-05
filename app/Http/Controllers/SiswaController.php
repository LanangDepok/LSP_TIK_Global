<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled('cari_nama')) {
            $cari_nama = $request->input('cari_nama');
            $query->where('Nm_pendaftar', 'like', '%' . $cari_nama . '%');
        }

        if ($request->filled('cari_jenis_kelamin')) {
            $cari_jenis_kelamin = $request->input('cari_jenis_kelamin');
            $query->where('Jenis_kelamin', '=', $cari_jenis_kelamin);
        }

        if ($request->filled('cari_jurusan')) {
            $cari_jurusan = $request->input('cari_jurusan');
            $query->where('Jurusan', '=', $cari_jurusan);
        }

        $siswa = $query->paginate(10);

        return view('index', ['siswa' => $siswa]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'Nm_pendaftar' => 'required',
            'Alamat' => 'required',
            'Jenis_kelamin' => 'required',
            'No_hp' => 'required|regex:/^[0-9]+$/',
            'Asal_sekolah' => 'required',
            'Jurusan' => 'required',
            'Tgl_lahir' => 'required|date|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
            'NISN' => 'required|regex:/^[0-9]+$/|min:0|unique:siswas,NISN',
        ];
        $messages = [
            'required' => 'Data tidak boleh kosong!',
            'regex' => 'Data harus berupa angka!',
            'unique' => 'Data sudah terdaftar sebelumnya',
            'date' => 'Tanggal lahir harus berupa tanggal yang valid!',
            'before_or_equal' => 'Anda masih terlalu muda!',
        ];
        $validated = Validator::make($data, $rules, $messages)->validate();

        Siswa::create($validated);

        return redirect('/')->with('success', 'Berhasil menambahkan data!');
    }
    public function edit($id)
    {
        $siswa = Siswa::where('Id_pendaftar', '=', $id)->first();
        return view('edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::query()->where('Id_pendaftar', '=', $id);
        $getSiswa = $siswa->first();

        $data = $request->all();
        $rules = [
            'Nm_pendaftar' => 'required',
            'Alamat' => 'required',
            'Jenis_kelamin' => 'required',
            'No_hp' => 'required|regex:/^[0-9]+$/',
            'Asal_sekolah' => 'required',
            'Jurusan' => 'required',
            'Tgl_lahir' => 'required|date|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
        ];

        if ($request->NISN != $getSiswa->NISN) {
            $rules['NISN'] = 'required|regex:/^[0-9]+$/|unique:siswas,NISN';
        } else {
            $rules['NISN'] = 'required|regex:/^[0-9]+$/';
        }

        $messages = [
            'required' => 'Data tidak boleh kosong!',
            'regex' => 'Data harus berupa angka!',
            'unique' => 'Data sudah terdaftar sebelumnya',
            'date' => 'Tanggal lahir harus berupa tanggal yang valid!',
            'before_or_equal' => 'Anda masih terlalu muda!',
        ];
        $validated = Validator::make($data, $rules, $messages)->validate();

        $siswa->update($validated);

        return redirect('/')->with('success', 'Data berhasil diubah!');
    }
    public function delete($id)
    {
        Siswa::where('Id_pendaftar', '=', $id)->delete();

        return redirect('/')->with('success', 'Berhasil menghapus data!');
    }
}
