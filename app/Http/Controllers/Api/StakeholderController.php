<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stakeholder;
class StakeholderController extends Controller
{
    public function index()
    {
        $stakeholders = Stakeholder::get();

        return response($stakeholders);
    }
}
