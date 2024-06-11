<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\CatatanKeuangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanKeuanganController extends Controller
{
    public function tambahCatatanKeuangan(Request $request)
    {
        $user = Auth::user();
        $record = CatatanKeuangan::create([
            'user_id' => $user->id,
            'type' => $request->type,
            'total' => $request->total,
            'deskripsi' => $request->deskripsi
        ]);

        return response()->json(['status' => true, 'data' => $record->id, 'message' => 'Sukses']);
    }

    public function updateCatatanKeuangan(Request $request, $id)
    {
        $record = CatatanKeuangan::find($id);
        if ($record) {
            $record->update($request->all());
            return response()->json(['status' => true, 'data' => $record->id, 'message' => 'Sukses']);
        }

        return response()->json(['status' => false, 'data' => null, 'message' => 'Gagal']);
    }

    public function listUsersWithRecords()
    {
        $users = User::with('catatanKeuangan')->get();
        return response()->json(['status' => true, 'data' => UserResource::collection($users), 'message' => 'Sukses']);
    }
}
