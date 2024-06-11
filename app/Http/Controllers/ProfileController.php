<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        if ($user) {
            $profile = $user->profile;

            if (!$profile) {
                $profile = Profile::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'alamat' => 'Banyuwangi, Jawa Timur',
                    'phone' => '+62 088886666'
                ]);
                $user->load('profile');
            }

            return response()->json([
                'status' => true,
                'data' => new UserResource($user),
                'message' => 'Get sukses'
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Data kosong'
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $profile = $user->profile;
            if ($profile) {
                $profile->update($request->all());
                return response()->json([
                    'status' => true,
                    'data' => $user->id,
                    'message' => 'Profil berhasil diperbarui'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => null,
                    'message' => 'Profil tidak ditemukan'
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Gagal mengupdate profil'
        ]);
    }
}
