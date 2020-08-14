<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\tasks;
//Always Capitalize your model names, it should be use App\Tasks; instead
use App\Tasks;

//Also, you have to import the validation facade. Thats what you'll use to validate your form
use Illuminate\Support\Facades\Validator;

//Import the paginator to use paginators in your pages
use Illuminate\Pagination\Paginator;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Remember, always capitalize your model names
    //   $tasks = tasks::all();
    $tasks = Tasks::paginate(10);

      return view('tasks.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tasks.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Do some research on form validations if you don't understand what I've done
        $validate_fields = Validator::make($request->all(),[
            'title' => ['required', 'min: 3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min: 10'],
            'description' => ['required', 'min: 30']
        ]);

        //Below is an example of an if statement
        if($validate_fields->fails()){
            //If validation fails, return to the form page with the validation errors
            return back()->withErrors($validate_fields);
        }else{
            //If fields are validated, add to database and redirect user
            Tasks::create([
                'title' => $request->title,
                'email' => $request->email,
                'mobile_number' => $request->phone,
                'body' => $request->description,
            ]);
            return redirect()->route('tasks.index');
        }
        
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This is where you view the task details. First of all, you have to fetch the task with the id that is passed
        $task = Tasks::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Fetch the task id that you want to edit
        $task = Tasks::findOrFail($id);
        return view('tasks.edit', compact('task'));
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
        $task = Tasks::findOrFail($id);
        $validate_fields = Validator::make($request->all(), [
            'title' => ['required', 'min: 3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min: 10'],
            'body' => ['required', 'min: 30']
        ]);
        if($validate_fields->fails()){
            return back()->withErrors($validate_fields);
        }else{
            $task->update([
                'title' => $request->title,
                'email' => $request->email,
                'mobile_number' => $request->phone,
                'body' => $request->body,
            ]);
            return redirect()->route('tasks.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
        return back();
    }
}
