@extends('layouts.frontend')

@section('content')

<div class="container">
    <h1>welcome Laravel Application</h1>
    <p>This is Employee page</p>
    <div class="row">
        <div class="col-md-12 mt-4 ">

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h3>Fetch Data From Database
                        <a href="{{ url('add-employee') }}" class="btn btn-primary float-end">Add Employee</a>
                    </h3>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td class=" text-center {{$item->status  == '0' ? 'text-danger' : 'text-success'}}">
                                        <b> {{ $item->status  == '0' ? 'Unactive' : 'Active' }}</b>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ url('edit-employee/'.$item->id) }}" class="btn btn-info">Edit</a>
                                        
                                        <a href="{{ url('delete-employee/'.$item->id) }}" class="btn btn-danger">Delete</a>
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