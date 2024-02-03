<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJabatanUserRequest;
use App\Models\JabatanUser;
use App\Models\User;
use Illuminate\Http\Request;

class JabatanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.jabatan.index', [
            'active' => 'jabatans',
            'jabatans' => JabatanUser::latest()->paginate(10),
            'count' => JabatanUser::get()->count(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.jabatan.create', [
            'active' => 'jabatans',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'jabatan' => 'required|unique:jabatans',
        ]);

        JabatanUser::create($validatedData);

        return redirect('/jabatan-user')->with('success', 'Jabatan baru telah ditambahkan.');
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
    public function edit(JabatanUser $jabatan)
    {
        return view('admin.user.jabatan.edit', [
            'jabatan' => $jabatan,
            'active' => 'jabatans',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanUserRequest $request, JabatanUser $jabatan)
    {
        $rules = [
            'id' => 'required',
        ];

        if ($request->jabatan != $jabatan->jabatan) {
            $rules['jabatan'] = 'required|unique:jabatans';
        }

        $validatedData = $request->validate($rules);
        $jabatan->update($validatedData);

        return redirect('/jabatan-user')->with('success', 'Jabatan telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanUser $jabatan)
    {
        if(User::where('jabatan_id',$jabatan->id)->count() != 0){
            return redirect('/jabatan-user')->with('failed', 'Gagal hapus jabatan karena data masih digunakan!');
        }
        JabatanUser::destroy($jabatan->id);
        User::where('jabatan_id', $jabatan->id)->delete();
        return redirect('/jabatan-user')->with('success', 'Jabatan telah dihapus.');
    }
}
