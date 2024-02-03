<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\JabatanUser;
use App\Models\Komisariat;
use App\Models\PanitiaKegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.user.index', [
            'active' => 'users',
            'users' => User::orderBy('nama', 'asc')
                ->filter(request(['search']))
                ->paginate(9)
                ->withQueryString(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komisariat = Komisariat::all(); 
        $jabatan = JabatanUser::all();
        return view('admin.user.user.create', [
            'komisariat' => $komisariat,
            'jabatan' => $jabatan,
            'active' => 'jabatans',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'komisariat_id' => 'required',
            'jabatan_id' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required',
            'level' => 'required',
            'angkatan' => 'required',
            'tgl_lahir' => 'required',
            'poin' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:5',
        ]);

        if ($request->file('foto')) {
            $imageName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $validatedData['foto'] = $imageName;
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/user')->with('success', 'User baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::find($user);
        $komisariat = Komisariat::all();
        $jabatan = JabatanUser::all();
        return view('admin.user.user.profile', [
            'komisariat' => $komisariat,
            'jabatan' => $jabatan,
            'user' => $user,
            'active' => 'users',
        ]); 
    }

    public function updateFoto(Request $request, User $user)
    {
        $rules = [
            'id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validatedData = $request->validate($rules);
  
        if ($request->file('foto')) {
            if ($user->foto) {
                File::delete('storage/images/'.$user->foto);
            }
            $imageName = Str::uuid() . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $validatedData['foto'] = $imageName;
        }
        User::where('id', $validatedData['id'])->update($validatedData);
        return redirect('/user')->with('success', 'Foto profil berhasil diperbarui');
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'komisariat_id' => 'required',
            'jabatan_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'angkatan' => 'required',
            'level' => 'required',
            'poin' => 'required',
            'password' => 'nullable|min:5',
        ];

        $validatedData = $request->validate($rules);

        // Hash the password only if it is provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // Remove password from the data if it is not provided to prevent it from being set to null
            unset($validatedData['password']);
        }

        // Find the user by ID and update the attributes
        User::where('id', $validatedData['id'])->update($validatedData);

        // Redirect to the user profile page with a success message
        return redirect('/user')->with('success', 'Profil berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(PanitiaKegiatan::where('kegiatan_id',$user->id)->count() != 0){
            return redirect()->back()->with('error', 'Gagal hapus kegiatan karena data masih digunakan!');
        }
        File::delete('storage/images/'.$user->foto);
        User::destroy($user->id);
        return redirect('/user')->with('success', 'level Kegiatan telah dihapus.');
    }

    public function profile()
    {
        return view('admin.profile.index', [
            'active' => 'profile',
            'komisariat' => Komisariat::all(),
            'jabatan' => JabatanUser::all(),
        ]); 
    }

    public function updateFotoUser(Request $request, User $user)
    {
        $rules = [
            'id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($user->foto) {
                File::delete('storage/images/'.$user->foto);
            }
            $imageName = Str::uuid() . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('storage/images'), $imageName);
            $validatedData['foto'] = $imageName;
        }
        User::where('id', $validatedData['id'])->update($validatedData);
        return redirect('/profile')->with('success', 'Foto profil berhasil diperbarui');
    }

    public function updateProfile(UpdateUserRequest $request, User $user)
    {
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'komisariat_id' => 'required',
            'jabatan_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'angkatan' => 'required',
            'level' => 'required',
            'poin' => 'required',
            'password' => 'nullable|min:5',
        ];

        $validatedData = $request->validate($rules);

        // Hash the password only if it is provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // Remove password from the data if it is not provided to prevent it from being set to null
            unset($validatedData['password']);
        }

        // Find the user by ID and update the attributes
        User::where('id', $validatedData['id'])->update($validatedData);

        // Redirect to the user profile page with a success message
        return redirect('/profile')->with('success', 'Profil berhasil diperbarui');
    }


}
