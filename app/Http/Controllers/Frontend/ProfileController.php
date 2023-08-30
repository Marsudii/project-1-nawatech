<?php

namespace App\Http\Controllers\Frontend;

//import packages laravel
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
//Import create file developer
use App\Models\User;
use App\Http\Requests\ProfileImageRequest;
use App\Http\Requests\ProfilePersonalRequest;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'is_verify_email']); // Add 'is_verify_email' middleware
    }

    public function profile($id)
    {
        $getDataUser = User::find($id);
        return view('frontend.Pages.Profile.profile')->with([
            'dataUser' => $getDataUser
        ]);
    }


    public function profileUpdateImage($id, ProfileImageRequest $profileImageRequest)
    {
        $user = User::findOrFail($id);
        $dataCheck = $profileImageRequest->validated();
        $fileimageProfile = $dataCheck['images_profile'];
        $random = Str::random(40);
        $extension = $fileimageProfile->getClientOriginalExtension();
        $namaFileImageProfile = $random . '.' . $extension;
        $fileimageProfile->move(public_path('assets/images/profile'), $namaFileImageProfile);
        $user->update([
            'images_profile' => $namaFileImageProfile
        ]);
        return redirect()->route('profile', $id)->with('pesan', 'Image Profile Berhasil Diupdate');
    }


    public function profileUpdatePersonal($id, ProfilePersonalRequest $profilePersonalRequest)
    {
        $user = User::findOrFail($id);
        $dataCheck = $profilePersonalRequest->validated();
        $user->update([
            'name' => $dataCheck['name'],
            'password' => Hash::make($dataCheck['password']),
        ]);

        return redirect()->route('profile', $id)->with('pesan', 'Personal Profile Berhasil Diupdate');
    }
}
