<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ria;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $tasks = Tasks::orderBy('id','desc')->paginate(10);

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

        if($validate_fields->fails()){
            return back()->withErrors($validate_fields);
        }else{
            Tasks::create([
                'title' => $request->title,
                'email' => $request->email,
                'mobile_number' => $request->phone,
                'body' => $request->description,
            ]);

            $data=[
                'title'=>$request->full_name,
                'email'=>$request->email,
                'body'=>$request->description,
                'mobile_number'=>$request->phone,
            ];

            Mail::send('Email.mail', $data ,function($message) use ($data){ 
                // $message->from('juniorlecrae@gmail.com', 'Nasaria Mumuni');
              $message->to('juniorlecrae@gmail.com', 'Karikari Adade')
              ->subject("You created a task named: ". $data['title']);
            });
            Session::flash('task_success', 'Task has been created successfully');
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
            
            Session::flash('update_success', 'Task has been updated successfully');
            return back();
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
        Session::flash('delete_success', 'Task has been deleted successfully');
        return back();
    }
}
