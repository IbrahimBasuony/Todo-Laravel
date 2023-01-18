<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function all()
    {
        $todo=Todo::where('status','=','todo')->orderby('id','desc')->get();
        $doing=Todo::where('status','=','doing')->orderby('id','desc')->get();
        $done=Todo::where('status','=','done')->orderby('id','desc')->get();
        return view('todo.layout',compact('todo','doing','done'));
    }

    public function create(Request $request){
        $data=$request->validate([
            "title"=>'required|string|max:255'
        ]);

        Todo::create($data);

        session()->flash("success","data inserted successfully");

        return redirect(url('all'));
    }


    public function edit($id)
    {
        $todo=Todo::findorfail($id);
        return view('todo.edit',compact('todo'));
    }

    public function update(Request $request , $id)
    {
        $todo=Todo::findorfail($id);
        $data=$request->validate([
            "title"=>'required|string|max:255'
        ]);
        $todo->update($data);

        session()->flash("success","data updated successfully");

        return redirect(url('all'));
    }

    public function doing( Request $request , $id)
    {
        $todo=Todo::findorfail($id);
        $todo['status']="doing";
        $todo->update([
            $request->status
        ]);
        return redirect(url('all'));

    }

    public function done( Request $request , $id)
    {
        $todo=Todo::findorfail($id);
        $todo['status']="done";
        $todo->update([
            $request->status
        ]);
        return redirect(url('all'));

    }

    public function delete($id)
    {
        $todo=Todo::findorfail($id);
       $todo->delete();

       session()->flash("success","data deleted successfully");
        return redirect(url('all'));

    }
}
