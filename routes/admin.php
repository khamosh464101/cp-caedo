<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\ProcurementController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MutahidUpdateController;
use App\Http\Controllers\Admin\StakeholderController;
use App\Http\Controllers\Admin\ExatraController;
use App\Http\Controllers\Admin\ResearchController;

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/')->group(function () {
    // This Roles can manage with Admin & Writers with specific policies.
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/post/search', [PostController::class, 'search'])->name('post.search');
    Route::get('/post/slug-get', [PostController::class, 'getSlug'])->name('post.getslug');
    Route::get('/project/search', [ProjectController::class, 'search'])->name('project.search');
    Route::get('/project/slug-get', [ProjectController::class, 'getSlug'])->name('project.getslug');
    Route::resources([
        'post' => PostController::class,
        'project' => ProjectController::class,
        'tag' => TagController::class,
        'mutahid' => MutahidUpdateController::class,
        'publication' => PublicationController::class,
        'stakeholder' => StakeholderController::class,
        'vacancy' => VacancyController::class,
        'procurement' => ProcurementController::class,
        'faq' => FaqController::class,
        'team' => TeamController::class,
        'setting' => SettingController::class,
        'exatra' => ExatraController::class,
        'research' => ResearchController::class
    ]);
    Route::resource('/account', AccountController::class, ['only' => ['index', 'update']]);
    // Special To Admin Role Only
    Route::middleware(['can:admin-only'])->group(function () {
        Route::get('/category/slug-get', [CategoryController::class, 'getSlug'])->name('category.getslug');
        Route::get('/pcategory/slug-get', [ProjectCategoryController::class, 'getSlug'])->name('pcategory.getslug');
        Route::get('/page/slug-get', [PageController::class, 'getSlug'])->name('page.getslug');
        Route::resource('/category', CategoryController::class);
        Route::resource('pcategory', ProjectCategoryController::class);
        Route::resource('/user', UserController::class, ['except' => [ 'show']]);
        Route::resource('/page', PageController::class);
        Route::resource('/role', RoleController::class, ['only' => ['index']]);
    });
});
