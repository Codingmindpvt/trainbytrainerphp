<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SepaController extends Controller
{
    public function verifySepaDebit(Request $request)
    {

        dd($request->all());

    }

    public function webhookVerifySepaDebit(Request $request)
    {
        Log::info($request->all());

    }
}