<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class ProfileController extends Controller
{

    public function __construct(Admin $profile)
    {
        $this->data = $profile;
        $this->middleware('auth:admin');
    }

    public function get_edit()
    {
        $singleData = $this->data->find($this->authAdmin()->id);

        return view('admin.profile.add_edit',compact('singleData'));
    }

    public function post_edit(ProfileRequest $request)
    {
        $this->data = $this->data->find($this->authAdmin()->id);
        $old_filename = $this->data->image;

        $photo = $request->image;
        if(!empty($photo)){
            $ofilename = $photo->getClientOriginalName();
            $file_ext = $photo->getClientOriginalExtension();
            $filename = md5($ofilename . microtime()) . '.' . $file_ext;
            $original_path = storage_path('app/public/profile');

            if($old_filename != $filename){
                $logo = Image::make($photo);

                if (!File::exists($original_path)){
                    File::makeDirectory($original_path, 0755, true);
                }

                $logo->save($original_path.'/'.$filename);

                //Delete old adv logo
                if (!empty($old_filename && $old_filename != $filename)) {
                    if (Storage::exists('public/profile/' . $old_filename)) {
                        Storage::delete('public/profile/' . $old_filename);
                    }
                }
            }
        }

        $this->data->name = $request->name;
        $this->data->email = $request->email;
        if($request->password != null) {
            $this->data->password = Hash::make($request->password);
        }
        if(!empty($photo)){
            $this->data->image =  $filename;
        } else{
            $this->data->image = $old_filename;
        }
        $this->data->save();

        return redirect()->back()->with('success', 'Profile data has been updated');
    }
}
