<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\LevelKegiatan;
use App\Models\JabatanKegiatan;
use App\Models\PanitiaKegiatan;

class PanitiaKegiatanController extends Controller
{
    public function index()
    {
        return view('admin.kegiatan.panitia-kegiatan.index', [
            'active' => 'panitia_kegiatans',
            // 'panitia_kegiatans' => PanitiaKegiatan::latest()->paginate(9),
            // 'count' => PanitiaKegiatan::get()->count(),
            'kegiatans' => Kegiatan::latest()->paginate(9),
            'count' => Kegiatan::get()->count(),
        ]);
    }

    public function lihatPanitia(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.panitia-kegiatan.lihat', [
            'active' => 'panitia_kegiatans',
            'panitia_kegiatans' => PanitiaKegiatan::where('kegiatan_id', $kegiatan->id)->latest()->paginate(9),
            'count' => PanitiaKegiatan::get()->count(),
        ]);
    }

    public function setuju()
    {
    }

    public function tolak()
    {
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.panitia-kegiatan.create', [
            'active' => 'panitia_kegiatans',
            'level' => LevelKegiatan::all(),
            'kepanitiaan' => JabatanKegiatan::all(),
        ]);
    }
}
