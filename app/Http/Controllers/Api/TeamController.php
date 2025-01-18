<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Traits\ApiResponse;

class TeamController extends Controller
{
    use ApiResponse;

    public function index()
    {
         $teams = Team::wherePublished(true)->get();
        return response($teams);
    }
}
