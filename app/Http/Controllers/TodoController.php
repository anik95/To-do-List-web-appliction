<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DB;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {   
       //$results = DB::select('select * from users where id = :id', ['id' => 1]); 
       // $todos = DB::select('select * from todo-list where user_id = ?', ['user_id'=>1]);
       //$todos=Todo::where('to_do', '=', 'Get groceries')->get(); 

       $todos = Todo::orderBy('created_at', 'desc')->paginate(2); 
       return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add to todo list
        $todo = new Todo();

        $todo->name=auth()->user()->name;
        $todo->user_id=auth()->user()->id;
        $todo->to_do=$request->input('to_do');
        $todo->save();

        return redirect()->route('todo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo= Todo::find($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->to_do=$request->input('to_do');
        $todo->save();

        return redirect()->route('todo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();
        return redirect()->route('todo.index')->with('success', 'Todo has been completed and has been removed from list');
    }
}
