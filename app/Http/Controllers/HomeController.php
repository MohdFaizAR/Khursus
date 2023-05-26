<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todolist;
use App\Http\Controllers\Todolists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        //$users = DB::table('user')-->get();
        //dd($todolists);
        // $todolists = Todolist::all(); // show all user
        //$todolists = Todolist::limit(10); // limit show 10 ja

        // Lazy loading looping berdasarkan database kalau ada 300 loop 300 untuk show data
        // $todolists = Todolist::get();
        // foreach($todolists as $x => $todolist){
        //     echo $todolists->user->name . '<br>';
        // }
        //dd($users);

        //eager loading
        $todolists = Todolist::with('user')->get(); //semua user kau ambil
        $todolists = Todolist::with('user')->orderBy('id', 'desc')->paginate(15);

        // $todolists = Todolist::with('user')->paginate(20); //klau mau display satu page 20 ja keluar

        return view('todolist.home', compact('todolists'));
    }

    public function create(){
        return view('todolist.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due.date.required' => 'required',
            'due_date' => 'bail|required|date'
        ]);

        $loggedUser = Auth::user();

        // call data
        $todolist = new Todolist();
        $todolist -> title =$request->title;
        $todolist -> description =$request->description;
        $todolist -> user_id = $loggedUser->id;
        $todolist -> due_date =$request-> due_date;
        $todolist -> created_at = Carbon::now();
        $todolist -> save();

        // Alternative call data
        // $data = [
        //     'title' = $request-> title,
        //     'description' = $request->description,
        //     'user_id' = $loggedUser->id,
        //     'due_date' = $request-> due_date,
        //     'created_at' = Carbon::now()
        //     ]
        // DB::table('todolists')->insert($data);
        return redirect() -> route('home')->with('success', 'Anda telah berjaya');
    }

    public function edit($id){
        $todolist = Todolist::find($id);
        $users = User::all();
        // $todolists = Todolist::where ('id', $id);
        // dd($todolists->user_id);
        return view('todolist.edit', compact('todolist', 'users'));
    }

    public function update(Request $request){
        $loggedUser = Auth::user();
        $todolist = Todolist::find($request->todolistID);
        $todolist -> title = $request->title;
        $todolist -> description =$request->description;
        $todolist -> user_id = $request->author;
        $todolist -> due_date =$request->due_date;
        $todolist -> updated_at = Carbon::now();
        $todolist -> updated_by = $loggedUser->id;
        $todolist -> save();
        return redirect()->route('home');
    }

    public function delete($id){
        $todolist = Todolist::find($id);
        $todolist->delete();
        return redirect()->route('home');
    }

}
