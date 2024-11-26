<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index () {
        return view('dashboard');
    }

    public function login(Request $request)
    {
        $id_user = $request->input('id_user');
        $passwd = $request->input('passwd');

        $user = User::select('id_user', 'nama_user', 'alamat_user', 'no_telp', 'email', 'passwd', 'disable_user', 'leveluser', 'unitup')->where([
            'id_user' => $id_user,
            'passwd' => $passwd
        ])->first();

        if ($user && !is_null($user->id_user)) {
            if (empty($id_user) or empty($passwd)) {
                $mout = [
                    'username' => $id_user,
                    'status' => 'error',
                    'message' => 'Harap isi username dan password'
                ];
                return response()->json($mout, 200);
            }

            if ($user && !is_null($user->id_user)) {
                $mout = [
                    'success' => true,
                    'message' => 'Login Berhasil',
                    'data' => [
                        'id_user' => $user->id_user,
                        'unitup' => $user->unitup,
                        'nama_user' => $user->nama_user,
                        'alamat_user' => $user->alamat_user,
                        'no_telp' => $user->no_telp,
                        'email' => $user->email,
                        'disable_user' => $user->disable_user,
                        'passwd' => $user->passwd,
                        'level_user' => $user->level_user,
                    ],
                    'register' => false,
                ];
                return response()->json($mout, 200);
            } else if (!$user) {
                $mout = [
                    'id_user' => $id_user,
                    'success' => false,
                    'message' => "Username atau password tidak sesuai",
                    'date' => []
                ];
                return response()->json($mout, 200);
            }
        } else if (!$user) {
            $mout = [
                'id_user' => $id_user,
                'success' => false,
                'message' => "Username atau password tidak sesuai",
                'register' => false,
                'date' => []
            ];
            return response()->json($mout, 200);
        }
    }
}
