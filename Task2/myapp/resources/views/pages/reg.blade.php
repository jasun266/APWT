@extends('layout.app')
@section('content')
<div class="container">
<form action="{{route('student.reg')}}" class="col-md-6" method="post">
    {{csrf_field()}}

    <div class="col-md-4 form-group">
        <span>Name</span>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
                <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class=" col-md-4 form-group">
        <span>Student ID</span>
        <input type="text" name="id" value="{{old('id')}}" class="form-control">
        @error('id')
                <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Email</span>
        <input type="email" name="email" value="{{old('email')}}" class="form-control">
        @error('email')
                <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
            <span>Phone</span>
            <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Date Of Birth</span>
        <input type="date" name="dob" value="{{old('dob')}}" class="form-control">
        @error('dob')
                <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <input type="submit" value="Add" class="btn btn-danger">
</form>
</div>

@endsection