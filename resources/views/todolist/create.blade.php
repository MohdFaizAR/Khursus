@extends('layouts.app')

@section('content')


<a href="{{ url()->previous() }}" class='btn btn-info'>BACK</a>

<div class="container-fluid">
    <form action="{{ route('todolist.store') }}" method="POST">
        {{-- @csrf call method form --}}
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="due_date">Due date</label>
                <input class="form-control" type="date" name="due_date" value="{{ old('due_date') }}">
                @error('due_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>

@endsection
