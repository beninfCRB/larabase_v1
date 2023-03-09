<?php

namespace App\Traits;

use RealRashid\SweetAlert\Facades\Alert;

trait UseMessage
{
    public function Alert()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::toast(session('success'), 'success');
            }

            if (session('error')) {
                Alert::toast(session('error'), 'error');
            }

            return $next($request);
        });
    }
}
