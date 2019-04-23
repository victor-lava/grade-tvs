<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = Student::orderBy('surname')->get();

      // ['lectures' => $students]; compact('lectures');

      return view('admin/students/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/students/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validateRequest($request);

      Student::create($request->all());

      return redirect()->route('students.create')->with('message', 'Įrašas sėkmingai sukurtas.');
    }

    public function validateRequest($request) {
      $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
        'phone' => 'required'
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin/students/edit', compact('student'));
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
      $this->validateRequest($request);

      // $lecture->name = $request->name;
      // $lecture->description = $request->description;
      // $lecture->save();

      Student::updateOrCreate(['id' => $student->id], $request->all());

      return redirect()->route('students.edit', $student->id)->with('message', 'Įrašas sėkmingai atnaujintas.');
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

      return redirect()->route('students.index')->with('message', "Įrašas #$student->id ($student->name) sėkmingai ištrintas.");
    }
}
