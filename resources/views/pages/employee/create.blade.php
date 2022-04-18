@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Employee <a class="btn btn-danger float-end" href="{{ url('employee')}}">Back</a></h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('store-employee') }}" method="POST">

                        @csrf
                       
                        

                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control">
                            @error('designation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
            </div>
        </div>
    </div>
</div>

@endsection