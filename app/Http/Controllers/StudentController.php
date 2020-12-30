<?php

namespace App\Http\Controllers;

use App\Student;
use App\Promotion;
use App\Module;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::all();
        $search = $request -> get("search");

        if (!(empty($search))) {
            $students = Student::where('lastname', 'like', '%' . $search . '%')
            ->get();
        }
 
        return view('students.index', ['students' => $students, 'search' => $search] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions = Promotion::all();
        $modules = Module::all();
        return view('students.create', ['modules' => $modules, 'promotions' => $promotions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->lastname = $request->lastname;
        $student->firstName = $request->firstname;
        $student->email = $request->email;
        $student->promotion_id = $request->promotion_id;
        $student->save();
        $student->modules()->attach($request->modules);

        return redirect(route("students.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view("students.show", ["student"=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $modules = Module::all();
        $promotions = Promotion::all();
        return view("students.edit", ["student" => $student, "modules" => $modules, "promotions" => $promotions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->lastname = $request->lastname;
        $student->firstname = $request->firstname;
        $student->email = $request->email;
        $student->promotion_id = $request->promotion_id;
        $student->modules()->detach();
        $student->push();
        $student->modules()->attach($request->modules);

        return redirect(route("students.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route("students.index"));
    }
}
