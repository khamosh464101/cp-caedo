<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Research;

class ResearchController extends Controller
{
    public function index()
    {
        $research = Research::get();

        return response($research);
    }
}
