<?php

namespace App\Http\Controllers;

use App\Models\jabatanKegiatan;
use App\Models\Kegiatan;
use App\Models\LevelKegiatan;
use App\Models\PanitiaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kegiatan.kegiatan.index', [
            'active' => 'kegiatans',
            'kegiatans' => Kegiatan::latest()->paginate(9),
            'count' => Kegiatan::get()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.kegiatan.create', [
            'active' => 'kegiatans',
            'level' => LevelKegiatan::all(),
            'kepanitiaan' => JabatanKegiatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $temp = [];
        $result = [];

        foreach ($request->id_jabatan as $id) {
            $key = "jumlah-" . $id;
            if (isset($request->$key)) {
                $temp[$id] = $request->$key;
            }
        }

        foreach ($temp as $id_jabatan => $jumlah) {
            $result[] = [
                'id_jabatan' => $id_jabatan,
                'jumlah' => $jumlah
            ];
        }
        $jsonJabatan = json_encode($result);

        $validatedData = $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('foto')) {
            $imageName = Str::uuid() . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $foto = $imageName;
        }

        Kegiatan::create([
            'level_id' => $request->level_id,
            'judul_kegiatan'  => $request->judul_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'tgl_pendaftaran' => $request->tgl_pendaftaran,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'dresscode' => $request->dresscode,
            'kuota' => $request->kuota,
            'lokasi' => $request->lokasi,
            'jabatan_kegiatan_id' => $jsonJabatan,
            'foto' => $foto,
        ]);

        return redirect()->to('kegiatan')->with('success', 'Berhasil Menambah Kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $arrayJabatan = json_decode($kegiatan->jabatan_kegiatan_id);
        // dd($arrayJabatan);
        return view('admin.kegiatan.kegiatan.edit', [
            'active' => 'kegiatans',
            'kegiatan' => $kegiatan,
            'level' => LevelKegiatan::all(),
            'kepanitiaan' => JabatanKegiatan::all(),
            'kepanitianChecked' => $arrayJabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $temp = [];
        $result = [];

        foreach ($request->id_jabatan as $id) {
            $key = "jumlah-" . $id;
            if (isset($request->$key)) {
                $temp[$id] = $request->$key;
            }
        }

        foreach ($temp as $id_jabatan => $jumlah) {
            $result[] = [
                'id_jabatan' => $id_jabatan,
                'jumlah' => $jumlah
            ];
        }
        $jsonJabatan = json_encode($result);



        if ($request->file('foto')) {
            $validatedData = $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($kegiatan->foto) {
                File::delete('storage/images/'.$kegiatan->foto);
            }


            $imageName = Str::uuid() . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $foto = $imageName;

            Kegiatan::where('id', $kegiatan->id)->update([
                'level_id' => $request->level_id,
                'judul_kegiatan'  => $request->judul_kegiatan,
                'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
                'tgl_pendaftaran' => $request->tgl_pendaftaran,
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'dresscode' => $request->dresscode,
                'kuota' => $request->kuota,
                'lokasi' => $request->lokasi,
                'jabatan_kegiatan_id' => $jsonJabatan,
                'foto' => $foto,
            ]);
        }else{
            Kegiatan::where('id', $kegiatan->id)->update([
                'level_id' => $request->level_id,
                'judul_kegiatan'  => $request->judul_kegiatan,
                'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
                'tgl_pendaftaran' => $request->tgl_pendaftaran,
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'dresscode' => $request->dresscode,
                'kuota' => $request->kuota,
                'lokasi' => $request->lokasi,
                'jabatan_kegiatan_id' => $jsonJabatan,
            ]);
        }

       

        return redirect()->back()->with('success', 'Berhasil Update Kegiatan');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        // dd($kegiatan);
        if(PanitiaKegiatan::where('kegiatan_id',$kegiatan->id)->count() != 0){
            return redirect()->back()->with('error', 'Gagal hapus kegiatan karena data masih digunakan!');
        }
        Kegiatan::destroy($kegiatan->id);
        File::delete('storage/images/'.$kegiatan->foto);
        return redirect()->back()->with('success', 'Kegiatan telah dihapus.');
    }
}
