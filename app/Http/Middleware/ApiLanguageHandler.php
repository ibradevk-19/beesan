<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ApiLanguageHandler
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if ($request->headers->get('Accept-Language')) {
    //         config('app.locale', $request->headers->get('Accept-Language'));
    //         \App::setLocale($request->headers->get('Accept-Language'));
    //         Carbon::setLocale($request->headers->get('Accept-Language'));
    //     } else {
    //         config('app.locale', 'ar');
    //         config('app.faker_locale', 'ar');
    //         \App::setLocale('ar');
    //         Carbon::setLocale('ar');
    //     }
    //     return $next($request);
    // }
     public function handle(Request $request, Closure $next)
    {
        $lang = $request->header('set_language'); // اللغة المطلوبة أو 'ar' افتراضيًا
        app()->setLocale($lang);
        \App::setLocale($lang);              // ✅ اللغة الفعلية
        Carbon::setLocale($lang);             // ✅ لتنسيقات التواريخ

        return $next($request);
    }
}
