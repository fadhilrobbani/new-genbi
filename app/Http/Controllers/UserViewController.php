<?php

namespace App\Http\Controllers;

use App\Models\JabatanKegiatan;
use App\Models\Kegiatan;
use App\Models\Komisariat;
use App\Models\PanitiaKegiatan;
use App\Models\PesertaKegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komisariat = Komisariat::all();
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->take(4)->get();
        $user = User::orderby('poin', 'desc')
            ->limit(6)
            ->get();;
        $top3 = User::orderby('poin', 'desc')
            ->limit(3)
            ->get();
        return view('user.landing', [
            'user' => $user,
            'top3' => $top3,
            'komisariat' => $komisariat,
            'kegiatan' => $kegiatan,
            'active' => 'kegiatan',
        ]);
    }

    public function leaderboard()
    {
        $komisariat = Komisariat::all();
        $user = User::orderby('poin', 'desc')->get();
        $top3 = User::orderby('poin', 'desc')
            ->limit(3)
            ->get();
        return view('user.leaderboard', [
            'user' => $user,
            'top3' => $top3,
            'komisariat' => $komisariat,
            'active' => 'leaderboard',
        ]);
    }

    public function kegiatan(Kegiatan $kegiatan)
    {
        $arrayJabatan = json_decode($kegiatan->jabatan_kegiatan_id);
        $jabatan = JabatanKegiatan::all();
        $kegiatan = Kegiatan::where('id', $kegiatan->id)->first();
        $cekPanitia = PanitiaKegiatan::select('jabatan_id', DB::raw('COUNT(*) as jumlah'))
            ->where([['kegiatan_id', $kegiatan->id], ['verifikasi', 1]])
            ->groupBy('jabatan_id')
            ->get();

        $cekPeserta = PesertaKegiatan::where('kegiatan_id', $kegiatan->id)
            ->get()
            ->count();
        // dd($cekPanitia);
        return view('user.kegiatan', [
            'jabatan' => $jabatan,
            'kegiatan' => $kegiatan,
            'active' => 'kegiatan',
            'kepanitianChecked' => $arrayJabatan,
            'cekPanitia' => $cekPanitia,
            'cekPeserta' => $cekPeserta,
        ]);
    }

    public function createPeserta(Kegiatan $kegiatan)
    {
        $cekPeserta = PesertaKegiatan::where([
            ['user_id', auth()->user()->id],
            ['kegiatan_id', $kegiatan->id]
        ])->get()->count();

        $cekPanitia = PanitiaKegiatan::where([
            ['user_id', auth()->user()->id],
            ['kegiatan_id', $kegiatan->id]
        ])->get()->count();
        // dd($cekPanitia);
        if (($cekPanitia != 0) || ($cekPeserta != 0)) {
            return redirect()->back()->with('error', 'Anda telah mendaftar kegiatan sebelumnya!');
        }
        // dd($panitia);
        PesertaKegiatan::create([
            'user_id'  => auth()->user()->id,
            'kegiatan_id' => $kegiatan->id,
        ]);
        return redirect()->back()->with('success', 'Berhasil mendaftar kegiatan !');
    }

    public function createPanitia(Kegiatan $kegiatan, $panitia)
    {
        $cekPeserta = PesertaKegiatan::where([
            ['user_id', auth()->user()->id],
            ['kegiatan_id', $kegiatan->id]
        ])->get()->count();

        $cekPanitia = PanitiaKegiatan::where([
            ['user_id', auth()->user()->id],
            ['kegiatan_id', $kegiatan->id]
        ])->get()->count();
        // dd($cekPanitia);
        if (($cekPanitia != 0) || ($cekPeserta != 0)) {
            return redirect()->back()->with('error', 'Anda telah mendaftar kegiatan sebelumnya!');
        }
        // dd($panitia);
        PanitiaKegiatan::create([
            'user_id'  => auth()->user()->id,
            'kegiatan_id' => $kegiatan->id,
            'jabatan_id' => $panitia,
        ]);
        return redirect()->back()->with('success', 'Berhasil mendaftar kegiatan silahkan tunggu verifikasi dari Admin !');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
