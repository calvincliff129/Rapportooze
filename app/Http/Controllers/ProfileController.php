<?php

namespace App\Http\Controllers;

use DB;
use Image;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        $imagePath = public_path('/uploads/avatars/').$user->avatar;

        return view('profile.edit')
                    ->withImagePath($imagePath)
                    ->withUser($user);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function chooseAvatar()
    {
        $user = auth()->user();
        $imagePath = public_path('/uploads/avatars/').$user->avatar;

        return view('profile.profile_picture')
                    ->withImagePath($imagePath)
                    ->withUser($user);
    }

    public function setAvatar(Request $request)
    {

    	// Handle avatar upload
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = auth()->user();
    		$user->avatar = $filename;
            // dd($user);
    		$user->save();
    	}

    	return redirect()->route('user_avatar.select');
    }

    public function deleteAvatar()
    {
        $user = auth()->user();

        if(\File::exists(public_path('/uploads/avatars/').$user->avatar)){

            \File::delete(public_path('/uploads/avatars/').$user->avatar);
            $user->avatar = null;
            $user->save();
        
        }
        
        return redirect()->route('user_avatar.select');
    }
}
