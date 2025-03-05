<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MutahidUpdate;
use App\Traits\ApiResponse;


class MutahidUpdateController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $audits = MutahidUpdate::where('published', true)->get();

        return response($audits);
    }


}
