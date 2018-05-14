<?php

namespace App\Http\Controllers;
use App\Category;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('home');
    }
    
    public function list(Category $category)
    {
        return view('home', [ 
            'category' => $category,         
            'questions' => $category->question()->paginate(5),
        ]);
    }
    
    public function createQuestion()
    {
        return view('createQuestion', [
            'categories' => Category::all()
        ]);
    }
    
    public function storeQuestion(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'authors_email' => 'required|string|email|max:255',
            'author' => 'required|string|max:255',
            'authors_email' => 'required|string|email|max:255',
            'description' => 'required|string|max:255',
            'question' => 'required|string'    
        ]);
        Question::create($request->all());

        return redirect()->route('home');
    }
}