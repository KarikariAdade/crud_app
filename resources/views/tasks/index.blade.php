@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>View your tasks here</h2>
                
               
            </div>
        </div>
    </div>
</div>
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

                     <td<a href="{{ route ('tasks.edit',$tasks->id) }}"></a></td>
                     <button class="btn btn-success"></button>

                        </tr>
                        @endforeach
                     </tbody>
                    
                    </table>
                    </form>

@endsection