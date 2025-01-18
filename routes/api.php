<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ProjectCategoryController;
use App\Http\Controllers\Api\ApiTagController;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CommandController;

use App\Http\Controllers\Api\TeamController as ApiTeamController;
use App\Http\Controllers\Api\FaqController as ApiFaqController;
use App\Http\Controllers\Api\VacancyController as ApiVacancyController;
use App\Http\Controllers\Api\ProcurementController as ApiProcurementController;
use App\Http\Controllers\Api\MutahidUpdateController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\StakeholderController;
use Illuminate\Support\Facades\Route;

//Public Api Routes
Route::apiResource('/posts',ApiPostController::class, ['only' => ['index', 'show']]);
Route::apiResource('/projects',ProjectController::class, ['only' => ['index', 'show']]);
Route::get('/posts/{type?}/{slug?}',[ApiPostController::class, 'index']);
Route::get('/projects/category/{slug?}',[ProjectController::class, 'index']);
Route::apiResource('/categories', ApiCategoryController::class, ['only' => ['index', 'show']]);
Route::apiResource('/pcategories', ProjectCategoryController::class, ['only' => ['index', 'show']]);
Route::apiResource('/tags', ApiTagController::class, ['only' => ['index', 'show']]);
Route::get('run-command', [CommandController::class, 'runCommand'])->middleware('DebugModeOnly');

Route::apiResource('/teams',ApiTeamController::class, ['only' => ['index', 'show']]);
Route::apiResource('/faqs',ApiFaqController::class, ['only' => ['index', 'show']]);
Route::apiResource('/audit-reports',MutahidUpdateController::class, ['only' => ['index']]);
Route::get('/vacancies', [ApiVacancyController::class, 'vacancies']);
Route::get('/volunteers', [ApiVacancyController::class, 'volunteers']);
Route::get('/itbs', [ApiProcurementController::class, 'itbs']);
Route::get('/noas', [ApiProcurementController::class, 'noas']);
Route::apiResource('/settings', SettingController::class, ['only' => ['index']]);
Route::apiResource('/stakeholders',StakeholderController::class, ['only' => ['index', 'show']]);
