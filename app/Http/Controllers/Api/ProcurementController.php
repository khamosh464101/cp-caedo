<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procurement;
use App\Traits\ApiResponse;

class ProcurementController extends Controller
{
    use ApiResponse;

    public function itbs()
    {
         $itbs = Procurement::wherePublished(true)->whereItbNoa(true)->get();
        return response($itbs);
    }

    public function noas()
    {
         $noas = Procurement::wherePublished(true)->whereItbNoa(false)->get();
        return response($noas);
    }
}
