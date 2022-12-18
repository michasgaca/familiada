<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use App\Repositories\ToDoRepository;

class ToDoController extends Controller
{
    protected $request;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function listOfToDos(ToDoRepository $toDoRepository) {
        
        $toDoLists = $toDoRepository->getAllToDos();
        return view('toDoLists.index', ['toDoLists' => $toDoLists->paginate(3)]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toDoLists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $toDoList = new ToDoList($request->all());
        $toDoList->save();
        return redirect()->action('TodoController@listOfToDos');
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
    public function edit(ToDoRepository $toDoRepository, $id)
    {
        $toDo = $toDoRepository->showToDoById($id);
        return view('toDoLists.edit', ['toDo' => $toDo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDoList $toDo)
    {
        $toDo->fill($request->all());
        $toDo->save();
        return redirect()->action('TodoController@listOfToDos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toDo = ToDoList::find($id);
        $toDo->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
