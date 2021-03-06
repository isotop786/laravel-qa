<?php

namespace App\Http\Controllers;
 

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionReqest;
use App\User;


class QuestionsController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(5);

        return view('questions.index',compact('questions'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question )
    {
       

        
        // if(\Gate::denies('ask-question',$question)){
        //     abort(403,'Please login or Register your account to ask a question');
        // }
       
        return view('questions.create',compact('question'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionReqest $request)
    {
        $request->user()->questions()->create($request->only('title','body'));

        return redirect()->route('questions.index')->with('success','Your Question has successfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('view');
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if(\Gate::allows('update-question',$question))
        {
        return view('questions.edit',compact('question'));
        }
        
        abort(403,"Access denied".'<a href="/questions">Go Back</a>');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionReqest $request, Question $question)
    {
       $question->update($request->only('title','body'));

       return redirect()->route('questions.index')->with('success','Update Succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        if(\Gate::denies('delete-question',$question)){
            abort(403,'Access Denied');
        }else{

        $question->delete();

        return redirect()->route('questions.index')->with('success','Your Question has deleted');
        }
    }
}
