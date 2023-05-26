@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>Todolist</h1>
                <div>
                    Create new todolist <a class="btn btn-danger" href="{{ route('todolist.create')}}" >Create</a>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }} {{ $todolists->links()}}</div>

                    <div class="card-body" >

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in! Muehehe') }}


                        @foreach ($todolists as $key => $todolist)
                            {{-- guna column panggil semua user--}}
                            {{-- <div class='card'>
                                <div class="card-title">
                                    {{ $todolist->title }}
                                </div>
                                <div class="card-body">
                                    {{ $todolist->description }} <br>
                                    <small>Created By: {{ $todolist->user->name }}
                                        <small>
                                </div>
                            </div> --}}

                            <table class="table">
                                <thead>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    @foreach ($todolists as $key => $todolist)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $todolist->title }}</td>
                                            <td>{{ $todolist->description }}</td>
                                            <td>{{ $todolist->user->name }}</td>
                                            <td>
                                                <a href="{{route('todolist.edit', $todolist->id)}}" > <i class="fas fa-edit" style="font-size: 2rem;" ></i>
                                            </td>
                                            <td>
                                                <a href="{{route('todolist.delete', $todolist->id)}}" > <i class="fa fa-trash" style="font-size: 2rem;"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
