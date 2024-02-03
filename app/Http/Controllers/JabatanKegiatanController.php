<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJabatanKegiatanRequest;
use Illuminate\Http\Request;
use App\Models\JabatanKegiatan;
use App\Models\PanitiaKegiatan;

class JabatanKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('admin.kegiatan.jabatan.index', [
            'active' => 'jabatan_kegiatans',
            'jabatan_kegiatans' => JabatanKegiatan::latest()->paginate(10),
            'count' => JabatanKegiatan::get()->count(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.jabatan.create', [
            'active' => 'jabatan_kegiatans',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'jabatan' => 'required|unique:jabatan_kegiatans',
        ]);

        JabatanKegiatan::create($validatedData);

        return redirect('/jabatan')->with('success', 'Jabatan baru telah ditambahkan.');
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
    public function edit(JabatanKegiatan $jabatan)
    {
        return view('admin.kegiatan.jabatan.edit', [
            'jabatan' => $jabatan,
            'active' => 'jabatan_kegiatans',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanKegiatanRequest $request, JabatanKegiatan $jabatan)
    {
        $rules = [
            'id' => 'required',
        ];

        if ($request->jabatan != $jabatan->jabatan) {
            $rules['jabatan'] = 'required|unique:jabatan_kegiatans';
        }

        $validatedData = $request->validate($rules);
        $jabatan->update($validatedData);

        return redirect('/jabatan')->with('success', 'Jabatan telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanKegiatan $jabatan)
    {
        if(PanitiaKegiatan::where('jabatan_id',$jabatan->id)->count() != 0){
            return redirect('/jabatan')->with('failed', 'Gagal hapus kategori karena data masih digunakan!');
        }
        JabatanKegiatan::destroy($jabatan->id);
        PanitiaKegiatan::where('jabatan_id', $jabatan->id)->delete();
        return redirect('/jabatan')->with('success', 'Jabatan Kegiatan telah dihapus.');
    }
}
