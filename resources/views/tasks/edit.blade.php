@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> </div>
        <div class="card-body">
          <h1 class="display-3">update a task</h1>
          @if ($errors->all())
          <div class="alert alert-danger">
            <ul>
             { @foreach($errors as $error)
              <li> {{$error->first()}}</li><br>
              @endforeach}

            </ul>
          </div>
          @endif
          @if(Session::has('update_success'))
          <p class="alert alert-success">{{session('update_success')}}</p>
          @endif
          <form method="POST" action="{{route('tasks.update', $task->id)}}">
            @method('PATCH')
            @csrf
            <div class="form group">
              <label for="title">title:</label>
              <input type="text" class="form-control" name="title" value="{{$task->title}}" />
            </div>
            <div class="form group">
              <label for="body">body:</label>
              <textarea rows="10" class="form-control" name="body" style="resize: none;">{{$task->body}}</textarea>
            </div>
            <div class="form group">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{$task->email}}">
            </div>
            <div class="form group">
              <label for="phone">phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$task->mobile_number}}">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection