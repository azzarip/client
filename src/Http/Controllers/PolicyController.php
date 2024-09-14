<?php

namespace Azzarip\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class PolicyController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = app()->getLocale();

        $policy = str_replace('-policy', '', $request->path());

        $content = File::get(__DIR__."/../../../content/policies/{$policy}/{$locale}.html");

        return view('client::policy', [
            'content' => $content,
        ]);
    }
}
