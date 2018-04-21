<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard(){
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'questions' => Question::Unanswered(5),
            'count_categories' => Category::count(),
            'count_questions' => Question::count(),
            'count_admins' => User::count(),
            'count_unanswered' => Question::where('answer', NULL)->count()
        ]);
    }
}