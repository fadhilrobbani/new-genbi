<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLevelKegiatanRequest;
use App\Models\Kegiatan;
use App\Models\LevelKegiatan;
use Illuminate\Http\Request;

class LevelKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('admin.kegiatan.level.index', [
            'active' => 'level_kegiatans',
            'level_kegiatans' => LevelKegiatan::latest()->paginate(10),
            'count' => LevelKegiatan::get()->count(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.level.create', [
            'active' => 'level_kegiatans',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'level' => 'required|unique:level_kegiatans',
            'poin' => 'required',
        ]);

        LevelKegiatan::create($validatedData);

        return redirect('/level-kegiatan')->with('success', 'Level baru telah ditambahkan.');
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
    public function edit(LevelKegiatan $level)
    {
        return view('admin.kegiatan.level.edit', [
            'level' => $level,
            'active' => 'level_kegiatans',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelKegiatanRequest $request, LevelKegiatan $level)
    {
        $rules = [
            'id' => 'required',
            'level' => 'required|unique:level_kegiatans,level,' . $level->id,
            'poin' => 'required|numeric' 
        ];

        $validatedData = $request->validate($rules);
        $level->update($validatedData);

        return redirect('/level-kegiatan')->with('success', 'Level telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelKegiatan $level)
    {
        if(Kegiatan::where('level_id',$level->id)->count() != 0){
            return redirect('/level-kegiatan')->with('failed', 'Gagal hapus level karena data masih digunakan!');
        }
        LevelKegiatan::destroy($level->id);
        Kegiatan::where('level_id', $level->id)->delete();
        return redirect('/level-kegiatan')->with('success', 'level Kegiatan telah dihapus.');
    }
}
