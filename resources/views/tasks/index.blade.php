@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th>Title</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($tasks as $task)
                         <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->email }}</td>
                            <td>{{ $task->mobile_number }}</td>
                            <td style="display: inline-flex;">
                                <a class="btn btn-primary mr-1" href="{{route('tasks.show', $task->id)}}" role="button">View</a>
                                <a class="btn btn-info mr-1" href="{{route('tasks.edit', $task->id)}}" role="button">Edit</a>
                                <a class="btn btn-danger" href="{{route('tasks.delete', $task->id)}}" role="button">Delete</a>
                            </td>
                        </tr>
                         @endforeach
                         
                     </tbody>
                 </table>
                 {{$tasks->links()}}
            </div>
        </div>
    </div>
</div>

{{--  <form>
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
                    </form>  --}}



@endsection
