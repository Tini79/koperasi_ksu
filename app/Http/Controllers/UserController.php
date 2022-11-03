<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('anggota_id', 'DESC')->get();

        return view('/pages.user.index', [
            'users' => $user,
        ]);
    }

    public function edit(User $datauser)
    {
        return view('/pages.user.edit', [
            'user' => $datauser
        ]);
    }

    public function update(UpdateUserRequest $request, User $datauser)
    {
        DB::beginTransaction();
        try {

            $datauser->fill($request->safe([
                'username',
                'password',
                'level',
            ]));

            $datauser->save();

            DB::commit();
        } catch (Exception $th) {
            DB::rollBack();

            return back()->with('danger', 'Gagal edit data!');
        }

        return redirect(route('show.user', ['datauser' => $datauser]))->with('success', 'Data berhasil diedit!');
    }

    public function show(User $datauser)
    {
        return view('/pages.user.show', [
            'user' => $datauser,
        ]);
    }
}
