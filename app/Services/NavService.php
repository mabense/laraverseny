<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class NavService
{


    public static function error(int $code, string $message = "")
    {
        return view('error')
            ->with('code', $code)
            ->with('message', $message ?: Response::$statusTexts[$code]);
    }


    public static function ajaxOrLoad(Request $request, View $view)
    {
        if ($request->ajax()) {
            /** @disregard P1013  */
            return $view->renderSections();
        }
        return $view;
    }
}
