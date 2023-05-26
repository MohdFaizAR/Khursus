@extends('layouts.app')

@section('content')

    <a href="{{ url()->previous() }}" class='btn btn-info'>BACK</a>

    <div class="container-fluid">
    <form action="{{ route('todolist.update') }}" method="POST">{{--route to submit on button--}}
        @csrf
        <input type="hidden" name="todolistID" value="{{ $todolist->id }}">
        <div class="row">
            <div class="col-md-6">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" value="{{ $todolist->title }}">
                @error('title')
                    <small class="text-danger">Sila masukkan title</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Due Date:</label>
                <input class="form-control" type="date" name="due_date" value="{{ $todolist->due_date }}">
                @error('due_date')
                    <small class="text-danger">Sila masukkan tarikh</small>
                @enderror
            </div>

            {{-- Description part --}}
            <div class="col-md-6">
                <label>Description:</label>
                <textarea class="form-control" type="text" name="description" >{{$todolist->description}}
                </textarea>
            </div>
            <div class="col-md-6">
                <label>Author: {{$todolist->user->name }} </label>
                <select class="form-control" id="selectUser" name='author' type= 'float'>
                    <option value="">--Please choose user--</option>
                    @foreach ($users as $key => $user)
                        <option value="{{ $user->id}}" {{{ $user->id == $todolist->user->id ? 'selected' : '' }}}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('author')
                <small class="text-danger">Sila masukkan Author</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>



@endsection
