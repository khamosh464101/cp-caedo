<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exatra;

class ExatraController extends Controller
{
    public function index()
    {
        $exatras = Exatra::get();

        return response($exatras);
    }
}
