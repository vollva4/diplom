<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.questions.index', [
        'questions'=>Question::orderBy('created_at', 'desc')->paginate(10)
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create($request->all());
        return redirect()->route('admin.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
         return view('admin.questions.edit',[
        'question'=>$question,
        'categories' => Category::all()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('admin.question.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
         $question->delete();
        return redirect()->route('admin.question.index');
    }
     
     public function hide(Question $question)
    {
        if ($question->published == 0) {
            $status = 1;
        } 
        else {
            $status = 0;
        }

        $question->update([
            'published' => $status,
        ]);
        return redirect()->route('admin.question.index');
    }
    public function answer(Question $question)
    {
         return view('admin.questions.answer',[
        'question'=>$question,
       ]);
    }
     public function unanswered()
    {
        return view('admin.questions.unanswered',[
            'questions' => Question::Unanswered()->paginate(10),
        ]);
    }
}
