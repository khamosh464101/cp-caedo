<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Traits\ApiResponse;

class VacancyController extends Controller
{
    use ApiResponse;

    public function vacancies()
    {
         $vacancies = Vacancy::wherePublished(true)->whereIsVacancy(true)->orderBy('id', 'desc')->get();
        return response($vacancies);
    }

    public function volunteers()
    {
         $volunteers = Vacancy::wherePublished(true)->whereIsVacancy(false)->orderBy('id', 'desc')->get();
        return response($volunteers);
    }
}
