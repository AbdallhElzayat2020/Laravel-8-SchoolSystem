<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Settings\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use AttachFilesTrait;

    public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });

        return view('Pages.settings.index', $setting);
    }


    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }

            if ($request->hasFile('logo')) {
                // حذف الشعار القديم
                $old_logo = Setting::where('key', 'logo')->value('value');
                if ($old_logo) {
                    $this->deleteFile($old_logo, 'logo');
                }

                // رفع الشعار الجديد
                $logo_name = $request->file('logo')->getClientOriginalName();
                $this->uploadFile($request, 'logo', 'logo');
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
            }

            toastr()->success(trans('messages.Update'));
            return back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }



}
