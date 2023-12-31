<?php // app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan semua profile
    public function index()
    {
        $profiles = Profile::all();
        return response()->json(['profiles' => $profiles], 200);
    }

    // Menampilkan satu profile berdasarkan ID
    public function show($id)
    {
        $profile = Profile::find($id);
        return response()->json(['profile' => $profile], 200);
    }

    // Membuat profile baru
    public function store(Request $request)
    {
        $profile = Profile::create($request->all());
        return response()->json(['profile' => $profile], 201);
    }

    // Mengupdate profile berdasarkan ID
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->update($request->all());
        return response()->json(['profile' => $profile], 200);
    }

    // Menghapus profile berdasarkan ID
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return response()->json(['message' => 'Profile deleted'], 200);
    }
}
