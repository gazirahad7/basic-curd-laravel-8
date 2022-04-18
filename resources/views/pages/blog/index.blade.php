@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header"><h4>Post  <a  class="btn btn-primary float-end" href="{{ url('posts/create') }}">Add Post</a></h4></div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>

                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center ">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->users->name }}</td>
                                    <td class="text-center"><img class="rounded" src="{{ asset('uploads/blog/'.$item->image) }}" alt="Image" width="50px" height="50px"></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class=" {{$item->status  == '0' ? 'text-danger' : 'text-success'}}">
                                        <b> {{ $item->status  == '0' ? 'Hidden' : 'Visible' }}</b>
                                    </td>

                                    <td class="text-center d-flex gap-2 ">
                                        <a href="{{ url('posts/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>
                                        {{-- <a href="{{ url('posts/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a> --}}

                                        <form action="{{ url('posts/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection