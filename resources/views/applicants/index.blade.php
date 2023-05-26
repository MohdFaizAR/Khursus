@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card col-10">
            <div class="card-header">
                <div class="d-flex justify-content-center" style="display: flex; flex-direction: column;">
                        <h1 class="d-flex justify-content-center">Job Applicant</h1>

                    {{-- <h5 >Job Applicant</h5> --}}
                    <a href="{{ route('applicants.create') }}" class="btn btn-primary">Add new applicant</a>
                </div>
            </div>

{{-- Form --}}
            <div class="card-body">
                @if ($applicants->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>name </th>
                                <th>IC Number</th>
                                <th>Date of Birth</th>
                                <th>Age</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- loop here --}}
                            @foreach ($applicants as $key => $applicant)
                            <tr>
                                <td>{{$applicant->name}}</td>
                                <td>{{$applicant->ic}}</td>
                                <td>{{$applicant->dob}}</td>
                                <td>{{$applicant->age}}</td>
                                <td>
                                    <a href="{{route('applicants.edit', $applicant->id)}}" > <i class="fas fa-edit" style="font-size: 2rem;" ></i>
                                    </td>
                                <td>
                                    <a href="{{route('applicants.delete', $applicant->id)}}" > <i class="fa fa-trash" style="font-size: 2rem;"></i>
                                </td>
                            </tr>
                            @endforeach
                            {{-- end loop --}}
                        </tbody>
                    </table>
                @else
                    <p class="text-bg-danger d-flex justify-content-center"> No Applicatons yet </p>
                @endif
            </div>
        </div>
    </div>

@endsection
