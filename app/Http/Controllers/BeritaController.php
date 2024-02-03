<?php

namespace App\Http\Controllers;

use App\Models\jabatanKegiatan;
use App\Models\Berita;
use App\Models\LevelKegiatan;
use App\Models\PanitiaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.berita.index', [
            'active' => 'beritas',
            'beritas' => Berita::latest()->paginate(9),
            'count' => Berita::get()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create', [
            'active' => 'beritas',
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

        Berita::create([
            'level_id' => $request->level_id,
            'judul_berita'  => $request->judul_berita,
            'deskripsi_berita' => $request->deskripsi_berita,
            'tgl_berita' => $request->tgl_berita,
            'lokasi' => $request->lokasi,
            'jabatan_kegiatan_id' => $jsonJabatan,
            'foto' => $foto,
        ]);
    
        return redirect()->to('berita')->with('success', 'Berhasil Menambah berita');
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
    public function edit(Berita $berita)
    {
        $arrayJabatan = json_decode($berita->jabatan_kegiatan_id);
        // dd($arrayJabatan);
        return view('admin.berita.edit', [
            'active' => 'beritas',
            'berita' => $berita,
            'level' => LevelKegiatan::all(),
            'kepanitiaan' => JabatanKegiatan::all(),
            'kepanitianChecked' => $arrayJabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
{
    // Check if $berita is not false (record exists)
    if ($berita) {
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

        // Check if a file is uploaded
        if ($request->file('foto')) {
            $validatedData = $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            // Delete the old image if it exists
            if ($berita->foto) {
                File::delete('storage/images/'.$berita->foto);
            }

            $imageName = Str::uuid() . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $foto = $imageName;
        } else {
            // If no new file is uploaded, use the existing image
            $foto = $berita->foto;
        }

        // Update the record
        $berita->update([
            'level_id' => $request->level_id,
            'judul_berita' => $request->judul_berita,
            'deskripsi_berita' => $request->deskripsi_berita,
            'tgl_berita' => $request->tgl_berita,
            'lokasi' => $request->lokasi,
            'jabatan_kegiatan_id' => $jsonJabatan,
            'foto' => $foto,
        ]);

        return redirect()->back()->with('success', 'Berhasil Update Kegiatan');
    } else {
        // Handle the case where the record doesn't exist
        return redirect()->back()->with('error', 'Record not found.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // dd($kegiatan);
        if(PanitiaKegiatan::where('berita_id',$berita->id)->count() != 0){
            return redirect()->back()->with('error', 'Gagal hapus Berita karena data masih digunakan!');
        }
        Berita::destroy($berita->id);
        File::delete('storage/images/'.$berita->foto);
        return redirect()->back()->with('success', 'Berita telah dihapus.');
    }
}