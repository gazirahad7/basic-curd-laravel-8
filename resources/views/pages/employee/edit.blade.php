@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Update Employee Data<a class="btn btn-danger float-end" href="{{ url('employee')}}">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-employee/'.$employee->id) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $employee->name }}" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $employee->email }}"
                                class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $employee->phone }}"
                                class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" value="{{ $employee->designation }}"
                                class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label >Status</label>
                            <input type="checkbox" name="status" id="designation" 
                                {{ $employee->status == 1 ? 'checked' : '' }} > Unactive-1 / Active-0
                        </div>
                        


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection