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
                    <div class="card-header">Update Post  <a  class="btn btn-danger float-end" href="{{ url('posts') }}">Back </a></div>

                    <div class="card-body">

                    <form action="{{ url('posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">

                            <div class="form-group mb-3">
                                <label >Image (File Upload)</label>
                                <input type="file" class="form-control" name="image" >
                            </div>
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter Title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{!! $post->description !!} </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="" {!! $post->status == 1 ? 'checked' : '' !!}> Show->0, Hide->1
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection