<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $completed_todos = Todo::where('completed', true)->get();
        $incompleted_todos = Todo::where('completed', false)->get();
        $completed = Todo::where('completed', true)->count();
        $incompleted = Todo::where('completed', false)->count();
        $total = Todo::all()->count();
        $productivity = $completed/$total;
        return view('welcome', ['todos' => $todos, 'completed_todos' => $completed_todos, 'incompleted_todos' => $incompleted_todos, 'productivity' => $productivity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'activity' => 'required|max:255',
            'dateline' => 'required',
        ]);

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->activity = $request->activity;
        $todo->dateline = $request->dateline;
        $todo->save();
        return redirect()->route('welcome');
        
        // $todos = Todo::all();
        // $completed_todos = Todo::where('completed', true)->get();
        // $incompleted_todos = Todo::where('completed', false)->get();
        // return view('welcome', ['todos' => $todos, 'completed_todos' => $completed_todos, 'incompleted_todos' => $incompleted_todos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        $todo = Todo::findorFail($id);
        $todo->completed = true;
        $todo->save();
        return redirect()->route('welcome');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findorFail($id);
        $todo->delete();
        return redirect()->route('welcome');
    }
}
