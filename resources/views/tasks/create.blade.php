@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Add tasks') }} </div>
        <div class="card-body">
        <h3>Add Tasks</h3>
        {{--  Whenever you want to submit a form for validation, add the method and action attributes to the form tag. you then add the blade csrf token (@csrf) as i've done  --}}
        <form class="row" method="POST" action="{{route('tasks.store')}}">
          @csrf
          @method('POST')
          <div class="form-group col-md-6">
            <input type="text" class="form-control" name="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{ $errors->first('title')}}</p>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
            @error('email')
            <p class="text-danger">{{ $errors->first('email')}}</p>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <input type="tel" class="form-control" name="phone" placeholder="Phone">
            @error('phone')
            <p class="text-danger">{{ $errors->first('phone')}}</p>
            @enderror
          </div>
          <div class="form-group col-md-12">
            <textarea rows="5" class="form-control" name="description" style="resize: none;" placeholder="Task Description"></textarea>
            @error('description')
            <p class="text-danger">{{ $errors->first('description')}}</p>
            @enderror
            <p><button class="btn btn-primary mt-5">Submit Task</button></p>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>


{{--  First of all, your form did not work because you didn't even submit it in the first place. Read about laravel form validation from the laravel website to get a clue as to how to do it  --}}
{{--  
<form>
  <div class="form-group">
    <label for="tittle">title</label>
    <input type="text" class="form-control" id="title" placeholder="title of your task">
  </div>
  <div class="form-group">
    <label for="body">body</label>
    <input type="text" class="form-control" id="body" placeholder="what's your task about">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Email Address">Email</label>
      <input type="email" class="form-control" id="Email Address">
    </div>
  </div>
  <div class="form-group">
    <label for="mobile number">mobile number</label>
    <input type="text" class="form-control" id="mobile number" placeholder="mobile number">
  </div>
  <div>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
  --}}


@endsection