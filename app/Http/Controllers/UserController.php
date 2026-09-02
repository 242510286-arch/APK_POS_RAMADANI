<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user
     */
    public function index(SearchRequest $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {

            $users = User::whereRaw(
                "MATCH(name, email) AGAINST(? IN BOOLEAN MODE)",
                [$keyword]
            )
            ->paginate(10)
            ->withQueryString();

        } else {

            $users = User::query()
                ->paginate(10)
                ->withQueryString();
        }

        return view('users.index', compact('users'));
    }


    /**
     * Form tambah user
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }


    /**
     * Simpan user
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $data['role_id'],
        ]);

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil dibuat');
    }


    /**
     * Form edit user
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }


    /**
     * Update user
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil diperbarui');
    }


    /**
     * Hapus user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil dihapus');
    }
}
