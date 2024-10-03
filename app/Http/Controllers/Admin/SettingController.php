<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingController extends Controller
{

    public function __construct(Setting $setting)
    {
        $this->data = $setting;
        $this->middleware('auth:admin');
    }

    public function get_edit()
    {
        $singleData = $this->data->find(1);

        return view('admin.setting.add_edit',compact('singleData'));
    }

    public function post_edit(SettingRequest $request)
    {
        $this->data = $this->data->find(1);
        $old_filename = $this->data->logo;

        $photo = $request->logo;
        if(!empty($photo)){
            $ofilename = $photo->getClientOriginalName();
            $file_ext = $photo->getClientOriginalExtension();
            $filename = md5($ofilename . microtime()) . '.' . $file_ext;
            $original_path = storage_path('app/public/setting');

            if($old_filename != $filename) {
                $logo = Image::make($photo);

                if (!File::exists($original_path)){
                    File::makeDirectory($original_path, 0755, true);
                }

                $logo->save($original_path.'/'.$filename);

                //Delete old adv logo
                if (!empty($old_filename && $old_filename != $filename)) {
                    if (Storage::exists('public/setting/' . $old_filename)) {
                        Storage::delete('public/setting/' . $old_filename);
                    }
                }
            }
        }

        $this->data->fill($request->all());
        $this->data->user_id = $this->authAdmin()->id;
        if(!empty($photo)){
            $this->data->logo = $filename;
        } else{
            $this->data->logo = $old_filename;
        }
        $this->data->save();

        $sessionMsg = $this->data->name;
        return redirect()->back()->with('success', 'Data has been updated');
    }
}
