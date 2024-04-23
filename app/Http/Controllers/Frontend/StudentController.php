<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Student;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $allStudent = Student::orderBy('name', 'asc')->get();
        // database data get results goes to compact function
        
        return DataTables::of($allStudent)
          ->addColumn('action', function($row){
              $actions = '<a href="#" class="btn btn-primary" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editStudent">Update</a>
             <button class="btn btn-danger" data-id="' . $row->id . '" id="delete">Delete</button>';

             return $actions;
          })
          ->rawColumns(['action'])
          ->make(true);

        return view('frontend.students.manage'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->post('name');
        $email = $request->post('email');

        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->save();
        return redirect()->route('student.manage');

        // dd($student);  // echo for form data it's built-In for database
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $std = Student::find($id);

        if(!is_null($std)){
            $student = Student::where('id', '=' , $id )->first();
            return view('frontend.students.edit', compact('student'));
        }
        else{
            // 404 not found
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        $student->name   = $request->name;
        $student->email  = $request->email;
        $student->save();
        return redirect()->route('student.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if(!is_null($student)){
            $student->delete();
            return redirect()->route('student.manage');
        }
        else{
            // 404 not found
        }

    }
}
