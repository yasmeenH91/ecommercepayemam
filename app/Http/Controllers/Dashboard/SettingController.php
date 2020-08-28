<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function editShippingMethods($type)
    {
        if ($type === 'free') {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        } elseif ($type === 'inner') {
            $shippingMethod = Setting::where('key', 'local_label')->first();
        } elseif ($type === 'outer') {
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        } else {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        }

        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));

    }

    public function updateShippingMethods(ShippingsRequest $request,$id)
    {
        try {
            $shipping_method = Setting::find($id);
//            $shipping_method->update([
//                'plain_value' => $request->plain_value,
//                'value' => $request->value
//            ]);
            DB::beginTransaction();
            $shipping_method->update(['plain_value' => $request->plain_value]);

            //save translations
            $shipping_method->value = $request->value;
            $shipping_method->save();
            DB::commit();
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with(['error'=>'فشل العملية']);
        }

    }
}
