<!--@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('manage tasks') }}  </div> 
                
                
 <form>
                    <table>
                        <thead>
                    <th> title</th>
                    <th>body</th>
                    <th> Email</th>
                    <th> mobile number</th>
                    <th>Action</th>
                        </thead>
                    <tbody>
                    @foreach($tasks as $task)
                      <tr>
                    <td> {{ $tasks->value}}</td>
                    <td>{{ $tasks->value}}</td>
                    <td>{{ $tasks->value}}</td>
                     <td>{{ $tasks->value}}</td>

                        </tr>
                        @endforeach
                     </tbody>
                    
                    </table>


            </div>
        </div>
    </div>
</div>

 @endsection -->