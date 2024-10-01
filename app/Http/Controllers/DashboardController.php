<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Data;
use PDO;

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

    public function getData(Request $request)
    {
        $dataP2apst = $this->dataP2apst();
        $dataCargo = $this->dataCargo();
        $dataAp2t = $this->dataAp2t();
        $rekapP2apst = $this->rekapP2apst();
        $rekapCargo = $this->rekapCargo();
        $rekapAp2t = $this->rekapAp2t();
        $taglisP2apst = $this->taglisP2apst();
        $nonTaglisP2apst = $this->nonTaglisP2apst();
        $taglisCargo = $this->taglisCargo();
        $nonTaglisCargo = $this->nonTaglisCargo();
        $taglisAp2t = $this->taglisAp2t();
        $nonTaglisAp2t = $this->nonTaglisAp2t();
        $perjamP2apst = $this->perjamP2apst();
        $perjamCargo = $this->perjamCargo();
        $perjamAp2t = $this->perjamAp2t();

        return response()->json([
            'success' => true,
            'data' => [
                'p2apst' => $dataP2apst,
                'cargo' => $dataCargo,
                'ap2t' => $dataAp2t,
                'rekap_p2apst' => $rekapP2apst,
                'rekap_cargo' => $rekapCargo,
                'rekap_ap2t' => $rekapAp2t,
                'taglis_p2apst' => $taglisP2apst,
                'nontaglis_p2apst' => $nonTaglisP2apst,
                'taglis_cargo' => $taglisCargo,
                'nontaglis_cargo' => $nonTaglisCargo,
                'taglis_ap2t' => $taglisAp2t,
                'nontaglis_ap2t' => $nonTaglisAp2t,
                'perjam_p2apst' => $perjamP2apst,
                'perjam_cargo' => $perjamCargo,
                'perjam_ap2t' => $perjamAp2t,
            ]
        ]);
    }

    public function dataP2apst(){
        return Data::select('jam_rekap', 'lbr_nontaglis_p2apst', 'lbr_postpaid_p2apst')->get();
    }

    public function dataCargo(){
        return Data::select('jam_rekap', 'lbr_nontaglis_cargo', 'lbr_postpaid_cargo')->get();
    }

    public function dataAp2t(){
        return Data::select('jam_rekap', 'lbr_nontaglis_ap2t', 'lbr_postpaid_ap2t')->get();
    }
    
    public function rekapP2apst(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('(lbr_nontaglis_p2apst + lbr_postpaid_p2apst) as jml_p2apst')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function rekapCargo(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('(lbr_nontaglis_cargo + lbr_postpaid_cargo) as jml_cargo')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function rekapAp2t(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('(lbr_nontaglis_ap2t + lbr_postpaid_ap2t) as jml_ap2t')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function perjamP2apst(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('jam_rekap, (lbr_nontaglis_p2apst + lbr_postpaid_p2apst) as perjam_p2apst')
            ->orderBy('jam_rekap', 'asc')
            ->get();
    }

    public function perjamCargo(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('jam_rekap, (lbr_nontaglis_cargo + lbr_postpaid_cargo) as perjam_cargo')
            ->orderBy('jam_rekap', 'asc')
            ->get();
    }

    public function perjamAp2t(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('jam_rekap, (lbr_nontaglis_ap2t + lbr_postpaid_ap2t) as perjam_ap2t')
            ->orderBy('jam_rekap', 'asc')
            ->get();
    }

    public function taglisP2apst(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_postpaid_p2apst as taglis_p2apst')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function nonTaglisP2apst(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_nontaglis_p2apst as nontaglis_p2apst')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function taglisCargo(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_postpaid_cargo as taglis_cargo')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function nonTaglisCargo(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_nontaglis_cargo as nontaglis_cargo')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function taglisAp2t(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_postpaid_ap2t as taglis_ap2t')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }

    public function nonTaglisAp2t(){
        return DB::table('arifrahmanhakim.vw_mon_lunas_perjam')
            ->selectRaw('lbr_nontaglis_ap2t as nontaglis_ap2t')
            ->orderBy('jam_rekap', 'desc')
            ->first();
    }
}
