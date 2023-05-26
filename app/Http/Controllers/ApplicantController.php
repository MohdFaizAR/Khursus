<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Applicant::all();
        return view('applicants.index', compact ('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $applicants = Applicant::all();
        return view('applicants.create', compact('applicants'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request){

        // dd($request);
        $request->validate([
            'name' => 'required',
            'ic' => 'required',
            'address' => 'required',
            'age' => 'required',
            'dob' => 'bail|required|date'

        ]);
        // $loggedUser = Auth::user();
        $applicants = new applicant();

        $applicants -> name=$request->name;
        $applicants -> ic =$request->ic;
        $applicants -> dob=$request-> dob;
        $applicants -> address=$request-> address;
        $applicants -> age=$request-> age;


        $applicants -> created_at = Carbon::now();
        $applicants -> save();

        // $applicants = Applicant::make($request->all(), [
        //     'dob' => 'required|date',
        // ]);
        // $age = Carbon::createFromFormat('Y-m-d', $request->input('dob'));
        // $age = $applicants->age;

        // if ($applicants->fails()) {
        //     return;
        //     // Handle validation failure
        // }

        return redirect() -> route('applicants.index')->with('success', 'okay');
    }

    /**
     * Display the specified resource.
     */
    public function show(applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        $users = User::all();
        // $todolists = Todolist::where ('id', $id);
        // dd($todolists->user_id);
        return view('applicants.edit', compact('applicant', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateapplicantRequest $request, applicant $applicant)
    {
        $loggedUser = Auth::user();
        $applicants = Applicant::find($request->applicantID);
        $applicants -> name = $request->name;
        $applicants -> address =$request->address;
        $applicants -> ic = $request->ic;
        $applicants -> dob =$request->dob;
        // $applicants -> age=$request-> age;

        $applicants -> updated_at = Carbon::now();
        $applicants -> updated_by = $loggedUser->id;
        $applicants -> save();
        return redirect()->route('applicants.index');
    }

// public function calculate($age){
//         $applicants = Applicant::find($id);

//         $currentDate = Carbon::now();
//         $age = $dob->diffInYears($currentDate);
//         if (!$applicants) {
//             // Handle case when record is not found
//         }

//         $applicants->delete();
//         return redirect()->route('applicants.index');

//         // Handle any post-deletion actions or redirections
//     }


public function delete($id){
        $applicants = Applicant::find($id);

        if (!$applicants) {
            // Handle case when record is not found
        }

        $applicants->delete();
        return redirect()->route('applicants.index');

        // Handle any post-deletion actions or redirections
    }
}
