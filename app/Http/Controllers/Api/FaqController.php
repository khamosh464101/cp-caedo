<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Traits\ApiResponse;

class FaqController extends Controller
{
    use ApiResponse;

    public function index()
    {
         $faqs = Faq::wherePublished(true)->get();
        return response($faqs);
    }

}
