<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Student;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $students = DB::table('students')->select('name', 'email')->get();
        // $students = Student::orderBy('name', 'asc')->get();
        // $students = Student::latest()->get();
        // $students = Student::oldest()->get();
        // $students = Student::inRandomOrder()->get();
        // $students = Student::first();
        // $students = Student::where('id', '=', 1)->Where('age', '>', 18)->get();
        // $students = Student::where('id', '=', 1)->orWhere('age', '>', 18)->get();
        // $students = Student::where('name', 'like', 'n%')->get();
        // $students = Student::skip(2)->limit(2)->get();
        // $students = Student::skip(2)->take(2)->get();
        // $students = Student::count();
        // $students = Student::max('age');
        // $students = Student::min('age');
        // $students = Student::sum('salary');

        // // multiple where add into an array format
        // $students = Student::where([
        //     ['name', '=' ,'Nazmul Hassan'],
        //     ['age', '>' ,'19'],
        // ])->get();

        // $students = Student::whereBetween('id', [2,4])->get();
        // $students = Student::whereNotBetween('id', [2,4])->get();
        // $students = Student::whereIn('id', [2,5,7,8])->get();
        // $students = Student::whereNotIn('id', [2,5,7,8])->get();
        // $students = Student::whereNull('name')->get();
        // $students = Student::whereNotNull('name')->get();
        // $students = Student::whereYear('created_at', '2024')->get();
        // $students = Student::whereDate('created_at', '2024-04-26')->get();
        // $students = Student::whereMonth('created_at', '6')->get();
        // $students = Student::whereDay('created_at', '27')->get();
        // $students = Student::whereTime('created_at', '12:47:13')->get();


        // dd($students);
        //dump($students); 

        // return view('frontend.students.manage', compact('students')); 
        return view('frontend.students.manage', ['students' => $students]); 
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
        // $name = $request->post('name');
        // $email = $request->post('email');

        $student = new Student();
        $student->name = $request->post('name');
        $student->email = $request->post('email');
        $student->save();
        // return redirect()->route('student.manage');

        return response()->json(['status' => 'success']);

        // dd($student);  // echo for form data it's built-In for database
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
    public function update(Request $request)
    {
        $student = Student::find($request->id);

        $student->name   = $request->name;
        $student->email  = $request->email;
        $student->save();

        return response()->json(['status' => 'success']);
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

    public function delete(Request $request)
    {
        Student::find($request->student_id)->delete();

        return response()->json(['status' => 'success']);
    }
}
