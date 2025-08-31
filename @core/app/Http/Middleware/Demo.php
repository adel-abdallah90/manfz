<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;


class Demo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $not_allow_path = [
          'admin-home',
          'seller',
          'buyer',
        ];
        $allow_path = [
            'admin-home/visited/os',
            'admin-home/visited/browser',
            'admin-home/visited/device',
            'admin-home/visited-url',
            'admin-home/media-upload/all',
            'admin-home/media-upload/loadmore',
            'admin-home/media-upload',
            // 'admin-home/media-upload/alt',
            // 'admin-home/general-settings/site-identity',
            // 'admin-home/update',
            // 'seller/service-delete*',
            'seller/logout',
            'buyer/send',
            'seller/send',
            'broadcasting/auth',
            'seller/get-dependent-subcategory',
            'seller/get-child-category-by-subcategory',
            // 'admin-home/widgets/update',
            // 'admin-home/update'
            //'buyer/jobpost/subcategory/get',
            // 'admin-home/languages/words/update/en_GB',
            // 'admin-home/media-upload/delete',
            // 'admin-home/general-settings/database-upgrade'
            // 'admin-home/general-settings/payment-settings',
            // 'admin-home/services/service-zone-settings-update'
            // 'admin-home/category/delete',
            // 'seller/profile-edit'
            
            ];
        $contains = Str::contains($request->path(), $not_allow_path);
        if($request->isMethod('POST') || $request->isMethod('PUT')) {

            if($contains && !in_array($request->path(),$allow_path)){
                if ($request->ajax()){
                    return response()->json(['type' => 'warning' , 'msg' => 'This is demonstration purpose only, you may not able to change few settings, once your purchase this script you will get access to all settings.']);
                }
                toastr_warning('This is demonstration purpose only, you may not able to change few settings, once your purchase this script you will get access to all settings.');
                return redirect()->back()->with(['type' => 'warning' , 'msg' => 'This is demonstration purpose only, you may not able to change few settings, once your purchase this script you will get access to all settings.']);
            }

        }

        return $next($request);
    }
}
