<?php

namespace App\Http\Controllers;

use App\Models\Stakeholder;
use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    // Menampilkan semua stakeholder di navbar
    public function view_NavStakeholder() //bisa diganti index
    {
        // Ambil semua stakeholder
        $stakeholders = Stakeholder::with(['projects'])->get();

        // Kembalikan data sebagai JSON
        return response()->json([
            'status' => 'success',
            'data' => $stakeholders,
        ]);
    }

   


    public function searchStakeholder($keyword){
        $stakeholder = Stakeholder::with(['projects'])->where('nama', 'like', '%' . $keyword . '%')->get();

        if ($stakeholder->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nama Stakeholder tidak ditemukan'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $stakeholder
        ]);
    }
}
