<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekonController extends Controller
{
    public function getRekon(Request $request)
    {
        $data = [
            'dkrp' => $this->getDataBySource('DKRP'),
            'dbp' => $this->getDataBySource('DBP'),
            'prr' => $this->getDataBySource('PRR'),
            'lancar' => $this->getDataBySource('LANCAR'),
            'dph' => $this->getDataBySource('DPH'),
        ];

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    private function getDataBySource($source)
    {
        return Rekon::where('SUMBER', $source)
            ->where(DB::raw("tgl"), 'LIKE', DB::raw("TO_CHAR(SYSDATE, 'YYYYMM') || '%'"))
            ->get();
    }

}
