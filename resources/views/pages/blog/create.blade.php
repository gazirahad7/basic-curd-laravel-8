@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header"><h4> Add Post  <a  class="btn btn-danger float-end" href="{{ url('posts') }}">Back </a></h4></div>

                    <div class="card-body">

                    <form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label >Image (File Upload)</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id=""> Show->0, Hide->1
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection