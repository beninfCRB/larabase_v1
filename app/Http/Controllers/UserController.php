<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    public $title = 'Kelola Akun';

    public function __construct()
    {
        $this->Alert();
    }

    public function index(UsersDataTable $dataTable)
    {
        $title = $this->title;
        $method = 'Data Semua Akun';
        return $dataTable->render('modules.user.index', compact('title', 'method'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $method = 'Buat Akun Baru';
        return View('modules.user.create', compact('title', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:users', 'string', 'max:255'],
            'email' => ['required', 'unique:users', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'isActive' => ['nullable', 'boolean']
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'isActive' => $request->has('isActive') == "1" ? "1" : "0"
            ]);
            return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $method = 'Ubah Akun';
        $data = User::find($id);
        return View('modules.user.update', compact('title', 'data', 'method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'isActive' => ['sometimes', 'boolean']
        ]);

        try {
            $user = User::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
                'isActive' => $request->has('isActive') == "1" ? "1" : "0"
            ]);
            return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data Berhasil Dihapus');
    }
}
