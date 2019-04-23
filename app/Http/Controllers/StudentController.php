<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
      $students = Student::orderBy('surname')->get();

      return view('student/index', compact('students'));
    }

    public function showGrades($id) {
      $student = Student::findOrFail($id);
      $grades = \App\Grade::where('student_id', $id)->get();
      // dd($grades);
      return view('student/grades', compact('grades', 'student'));
    }
}
