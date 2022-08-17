<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCar;
use App\Comment;
use App\User;


class CommentController extends Controller
{

  public function __construct()
{
    $this->middleware('auth', ['except' => 'store']);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModelCar $modelCar)
    {
    //  return response()->jason($post->comment()->with('user')->latest()->get());
    }

public function store(Request $request){
  $validatedData = $request -> validate([
  'comment_content' => 'required|max:255',
  'model_id' => 'required'
  ]);
  $modelCar = ModelCar::findOrFail($request->model_id);
  $comment = new Comment;
  $comment->comment_content = $validatedData['comment_content'];
  $comment->model_id = $validatedData['model_id'];
  $comment->user_id = auth()->id();
  $comment->save();

  session()->flash('message', 'Comment was created.');
  return redirect()->route('modelCars.show', $modelCar->id);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    //{
    //  $validatedData = $request->validate([
    //    'user_id'=>'reuired',
    //    'model_id' => 'required',
    //    'comment_comment_content' => 'required|max:255'
    //  ]);
    //  $modelCar = ModelCar::findOrFail($request->model_id);
    //  $comment = new Comment;
    //  $comment->user_id = auth()->id();
    //  $comment->model_id = $validatedData['model_id'];
    //  $comment->comment_comment_content = $validatedData['comment_comment_content'];
    //  $comment->save();
    //  session()->flash('message', 'Comment created.');
    //  return redirect()->route('modelCars.show',[$modelCar]);
    //  //redirect()->route('modelCars.show',['id'=>$modelCar->id]);
    //}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $commentomment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = Comment::findOrFail($id);
      return view ('comments.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $commentomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validatedData = $request ->validate([
        'comment_content' => 'required|max:255'
      ]);

      $comment = Comment::findOrFail($id);
      $comment->comment_content = $validatedData['comment_content'];
      $comment->save();

      return redirect()->route('modelCars.show',$comment->model_id);
        //$modelCars = $comment->modelCars;
        //$comment->update($request->all());
        //return redirect()->route('modelCars.show',['modelCars'=>$modelCars]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $commentomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //$comment->delete();
        //return back()->with('message', 'Comment deleted.');
    }
}
