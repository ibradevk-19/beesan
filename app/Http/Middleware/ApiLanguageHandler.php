<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ApiLanguageHandler
{

     public function handle(Request $request, Closure $next)
    {
         // تحديد اللغة المطلوبة أو اللغة الافتراضية 'ar'
        $lang = $request->header('Set-Language', 'ar');

        // قائمة اللغات المدعومة (يمكنك تخصيصها حسب النظام)
        $supportedLocales = ['ar', 'en'];

        // التحقق من أن اللغة مدعومة
        if (!in_array($lang, $supportedLocales)) {
            $lang = 'ar'; // اللغة الافتراضية في حال كانت غير مدعومة
        }

        // تعيين اللغة للتطبيق و Carbon
        app()->setLocale($lang);
        Carbon::setLocale($lang);

        return $next($request);
    }
}
