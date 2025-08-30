<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProjectCategory;
use App\Models\Post;
use App\Models\Project;
use App\Models\Stakeholder;
use App\Models\Team;
use App\Models\MutahidUpdate;
use App\Models\Research;
use App\Models\Procurement;
use App\Models\Vacancy;
use App\Models\Tag;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        $tags = Tag::count();
        $users = User::count();
        $board_count = Team::where('is_board_member', true)->count();
        $management_count = Team::where('is_board_member', false)->count();
        $project_categories = ProjectCategory::count();
        $projects = Project::count();
        $stakeholders = Stakeholder::count();
        $researchs = Research::count();
        $procurements = Procurement::count();
        $vacancies = Vacancy::where('is_vacancy', 1)->count();
        $volunteers = Vacancy::where('is_vacancy', 0)->count();
        $news_letter_users = User::where('news_letter', true)->count();

        return view('admin.index', compact(
            'categories', 
            'posts', 
            'tags', 
            'users', 
            'news_letter_users',
            'management_count',
            'projects',
            'board_count',
            'project_categories',
            'stakeholders',
            'researchs',
            'procurements',
            'vacancies',
            'volunteers'
        ));
    }
}
