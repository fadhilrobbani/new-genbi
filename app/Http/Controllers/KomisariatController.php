<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateKomisariatRequest;
use App\Models\Komisariat;
use App\Models\User;
use Illuminate\Http\Request;

class KomisariatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('admin.user.komisariat.index', [
            'active' => 'komisariats',
            'komisariats' => Komisariat::latest()->paginate(10),
            'count' => Komisariat::get()->count(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.komisariat.create', [
            'active' => 'komisariats',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'komisariat' => 'required|unique:komisariats',
        ]);

        Komisariat::create($validatedData);

        return redirect('/komisariat')->with('success', 'Jabatan baru telah ditambahkan.');
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
    public function edit(Komisariat $komisariat)
    {
        return view('admin.user.komisariat.edit', [
            'komisariat' => $komisariat,
            'active' => 'komisariats',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomisariatRequest $request, Komisariat $komisariat)
    {
        $rules = [
            'id' => 'required',
        ];

        if ($request->komisariat != $komisariat->komisariat) {
            $rules['komisariat'] = 'required|unique:komisariats';
        }

        $validatedData = $request->validate($rules);
        $komisariat->update($validatedData);

        return redirect('/komisariat')->with('success', 'Komisariat telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komisariat $komisariat)
    {
        if(User::where('komisariat_id',$komisariat->id)->count() != 0){
            return redirect('/komisariat')->with('failed', 'Gagal hapus komisariat karena data masih digunakan!');
        }
        Komisariat::destroy($komisariat->id);
        User::where('komisariat_id', $komisariat->id)->delete();
        return redirect('/komisariat')->with('success', 'Komisariat telah dihapus.');
    }
}
