<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\User;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.profile.index');
    }

    public function edit() {
        return view('admin.profile.edit');
    }

    public function update(Request $request) {
        echo "udpate";
        return view('admin.profile.index');
    }

    public function updateImage(Request $request) {
        
        $updateProfile = User::find($request->id);

        if($request->image!=''){
            $image = $request->image;
    
            $randomname = Str::random(30);
            $extension  = $image->getClientOriginalExtension();
    
            $imagename = $randomname.'.'.$extension;

            $request->image->move(public_path('/images/profile'), $imagename);
    
            // if(!Storage::disk('public')->exists('profile'))
            // {
            //     Storage::disk('public')->makeDirectory('profile');
            // }
            // $profileImage = Image::make($image)->resize(250, 300)->save('foo');
            // Storage::disk('public')->put('profile/'.$imagename, $profileImage);
    
            $updateProfile->avatar = $imagename;
            $updateProfile->update();
            
          }

        return redirect()->route('admin.profile.index');
    }
}
