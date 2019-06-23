@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
@if (count($errors) > 0)

      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
  @endif



     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
<form method="post" action="{{route('store')}}">
    @csrf
  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="exampleInputName1">{{__('Name') }}</label>
    <input type="text" name="name" class="form-control validate" id="exampleInputName1"  placeholder="Enter name">
    @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>
 
  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="exampleInputEmail1">{{__('Email') }}</label>
    <input type="email" name="email" class="form-control validate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
  </div>
  <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
    <label for="exampleInputName1">{{__('Pincode') }}</label>
    <input type="number" name ="pincode" class="form-control validate" id="exampleInputPincode1"  placeholder="Enter pincode">
            @if ($errors->has('pincode'))
                <span class="text-danger">{{ $errors->first('pincode') }}</span>
            @endif
  </div>
  
        
  <button type="submit" class="btn btn-primary">Submit</button>

  </form>
  </div>
  </div>

</div>

@endsection
