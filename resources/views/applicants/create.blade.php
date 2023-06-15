@extends('layouts.app')

@section('content')
<a href="{{ url()->previous() }}" class='btn btn-info'>BACK</a>

<div class="container-fluid">

    <form action="{{ route('applicants.store') }}" method="POST">
        <h1>Create new applicant</h1>
        <h2>MOMOCHAN</h2>
        {{-- @csrf call method form --}}
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="ic">IC number</label>
                <textarea class="form-control" name="ic" rows="5">{{ old('ic') }}</textarea>
                @error('ic')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="dob">Date of Birth</label>
                <input class="form-control" type="date" name="dob" id="dob" onchange="calculateAge()">
                @error('dob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" rows="5">{{ old('address') }}</textarea>
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="age">Age</label>
                <input class="form-control" type="number" id="age" name="age" readonly>
                {{-- <textarea class="form-control" name="age" id="age" rows="5" onchange="calculateAge()"></textarea>
                --}}
                @error('age')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
{{-- Calculate age --}}
<script>
    function calculateAge() {
            var dob = document.getElementById('dob').value;
            var dobDate = new Date(dob);
            var today = new Date();
            var age = Math.floor((today - dobDate) / (365.25 * 24 * 60 * 60 * 1000))
            document.getElementById('age').value = age;
        }
</script>
@endsection
