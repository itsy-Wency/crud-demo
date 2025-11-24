<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginRedirectController extends Controller
{
    public function redirect()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('products.index');
    }
}
