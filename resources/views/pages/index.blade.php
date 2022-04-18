@extends('layouts.frontend')

@section('content')

    <div class="container mt-3  ">

        <div class="card">

            <div class="card-body rounded">
                <h2 class="text-center">Welcome Laravel - 8 Application</h2>
                <p class="text-center">
                    <a href="{{ url('posts') }}" class="btn btn-primary">View Posts</a>
                    <a href="{{ url('posts/create') }}" class="btn btn-success">Add Post</a>
            </div>
        </div>


        <div class="mt-3 bordered">
            <h2 class="text-center">Project Summery</h2>
            <h5>Everything I have done in this project !!!
            </h5>
            <ol>
                <b>
                <li>Use Bootstrap tamplate for UI</li>
                <li>Views some pages</li>
                <li>Migrations,Routes,Controllers</li>
                <li>Use Blade template</li>
                <li>Use Eloquent ORM</li>
                <li>Use DB as MySql</li>
                <li>Use Session</li>
                <li>Use Auth for Users Authentication</li>
                <li>Use File</li> 
                <li>Use Hash</li>
                <li>Use Laravel From Validation</li>
                <li>Basic CURD</li>
            </b>
            </ol>
        </div>

    </div>
@endsection