<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UseMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UseMessage;
    public $title = 'Profile';

    public function __construct()
    {
        $this->Alert();
    }


    public function index()
    {
        $title = $this->title;
        $data = User::find(auth()->user()->id);
        $method = 'Akun Saya';
        $breadcumb = [$title, $method];
        return view('modules.profile.index', compact('title', 'method', 'data', 'breadcumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password_old' => ['nullable', 'string', 'min:8'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'picture'     => 'nullable', 'image', 'mimes:png,jpg,jpeg'
        ]);

        try {
            $user = User::find($id);
            $data = [
                'name' => $request->name
            ];


            if ($request->file('picture')) {
                if ($user->picture) {
                    Storage::delete($user->picture);
                }
                $picture = $request->file('picture')->store('avatar');
                $data = array_merge($data, ['picture' => $picture]);
            }

            if ($request->password_old) {
                $data = array_merge($data, ['password' => Hash::make($request->password)]);
            }

            $user->update($data);

            return redirect()->route('profile.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('profile.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
        //
    }
}
