<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // dd($request->all()); 
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|min:8|confirmed',
            ]);

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            }

            $imagePath = null;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/profile', $imageName);

                if (!$imagePath) {
                    return back()->with('error', 'Ups, sepertinya ada yang salah.');
                }

                $data['foto'] = $imageName;
            }

            User::create($data);

            return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/profile', $imageName);

            if ($imagePath) {
                $data['foto'] = $imageName;
            } else {
                return back()->with('error', 'Ups, sepertinya ada yang salah saat mengunggah foto.');
            }
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'Profil berhasil diubah');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }
}
