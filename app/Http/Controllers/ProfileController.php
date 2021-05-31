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
        $path = 'user_avatars';

        if (Storage::disk('s3')->exists($path.'/'.$user->avatar))
        {
            $url = Storage::disk('s3')->temporaryUrl(
                $path.'/'.$user->avatar,
                now()->addMinutes(60)
            );
        } else {
            $url = 0;
        }

        return view('profile.edit')
                    ->withUrl($url)
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
        
        $path = 'user_avatars';
        if (Storage::disk('s3')->exists($path.'/'.$user->avatar))
        {
            $url = Storage::disk('s3')->temporaryUrl(
                $path.'/'.$user->avatar,
                now()->addMinutes(60)
            );
        } else {
            $url = 0;
        }

        return view('profile.profile_picture')
                    ->withUrl($url)
                    ->withUser($user);
    }

    public function setAvatar(Request $request)
    {
        $this->validateWith([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $user = auth()->user();
    	// Handle avatar upload
    	if($request->hasFile('avatar')){

            $avatar = $request->file('avatar');
            $path = 'user_avatars';
            $filename = time().'.'.$request->avatar->getClientOriginalExtension();
            $avatar->storePubliclyAs(
                $path,
                $filename,
                's3'
            );
    		
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return redirect()->route('user_avatar.select');
    }

    public function deleteAvatar()
    {
        $user = auth()->user();

        $path = 'user_avatars';
        Storage::disk('s3')->delete($path.'/'.$user->avatar);
        $user->avatar = null;
        $user->save();
        
        return redirect()->route('user_avatar.select');
    }
}
