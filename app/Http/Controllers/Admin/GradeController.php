<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Student;
use App\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        // ['grades' => $grades]; compact('grades');

        return view('admin/grades/index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $lectures = Lecture::all();

        return view('admin/grades/create', compact('students', 'lectures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validateRequest($request);

        // Neveikia, kol nera nusirodyti fillable laukai Grade modelyje
        // dd($request->all());

        // Grade::create(['name' => $request->name,
        //                  'description' => $request->description]);

        // dd(DB::getQueryLog());
        // request->all() grazina visus duomenis masyve
        Grade::create($request->all());

        return redirect()->route('grades.create')->with('message', 'Įrašas sėkmingai sukurtas.');

        // return view('admin/grades/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('admin/grades/edit', compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {

      $this->validateRequest($request);

      // $grade->name = $request->name;
      // $grade->description = $request->description;
      // $grade->save();

      Grade::updateOrCreate(['id' => $grade->id], $request->all());

      return redirect()->route('grades.edit', $grade->id)->with('message', 'Įrašas sėkmingai atnaujintas.');
    }

    public function validateRequest($request) {
      $request->validate([
        'grade' => 'required|numeric|max:10',
        'student_id' => 'required|numeric|exists:students,id',
        'lecture_id' => 'required|numeric|exists:lectures,id'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('message', "Įrašas #$grade->id ($grade->name) sėkmingai ištrintas.");
    }
}
