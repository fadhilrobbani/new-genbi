<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\LevelKegiatan;
use App\Models\PesertaKegiatan;

class PesertaKegiatanController extends Controller
{
    //

    public function index()
    {
        return view('admin.kegiatan.peserta-kegiatan.index', [
            'active' => 'peserta_kegiatans',
            // 'panitia_kegiatans' => PanitiaKegiatan::latest()->paginate(9),
            // 'count' => PanitiaKegiatan::get()->count(),
            'kegiatans' => Kegiatan::latest()->paginate(9),
            'count' => Kegiatan::get()->count(),
        ]);
    }

    public function lihatPeserta(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.peserta-kegiatan.lihat', [
            'active' => 'peserta_kegiatans',
            'peserta_kegiatans' => PesertaKegiatan::where('kegiatan_id', $kegiatan->id)->latest()->paginate(9),
            'count' => PesertaKegiatan::get()->count(),
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
    // public function create()
    // {
    //     return view('admin.kegiatan.panitia-kegiatan.create', [
    //         'active' => 'panitia_kegiatans',
    //         'level' => LevelKegiatan::all(),
    //         'kepanitiaan' => JabatanKegiatan::all(),
    //     ]);
    // }
}
