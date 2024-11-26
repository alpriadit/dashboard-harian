<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekonController extends Controller
{
    public function getRekon(Request $request)
    {
        $model = new Rekon();

        $dataDKRP = $this->getDKRP();
        $dataDBP = $this->getDBP();
        $dataPRR = $this->getPRR();
        $dataLANCAR = $this->getLANCAR();
        $dataDPH = $this->getDPH();

        return response()->json([
            'success' => true,
            'data' => [
                'dkrp' => $dataDKRP,
                'dbp' => $dataDBP,
                'prr' => $dataPRR,
                'lancar' => $dataLANCAR,
                'dph' => $dataDPH,
            ]
        ]);
    }

    public function getDKRP(){
        return Rekon::where('SUMBER', 'DKRP')->get();
    }

    public function getDBP(){
        return Rekon::where('SUMBER', 'DBP')->get();
    }

    public function getPRR(){
        return Rekon::where('SUMBER', 'PRR')->get();
    }

    public function getLANCAR(){
        return Rekon::where('SUMBER', 'LANCAR')->get();
    }

    public function getDPH(){
        return Rekon::where('SUMBER', 'DPH')->get();
    }
}
