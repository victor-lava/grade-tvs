<?php

namespace App\Http\Controllers\Admin;

use App\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::orderBy('name')->get();

        // ['lectures' => $lectures]; compact('lectures');

        return view('admin/lectures/index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lectures/create');
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

        // Neveikia, kol nera nusirodyti fillable laukai Lecture modelyje
        // dd($request->all());

        // Lecture::create(['name' => $request->name,
        //                  'description' => $request->description]);

        // dd(DB::getQueryLog());
        // request->all() grazina visus duomenis masyve
        Lecture::create($request->all());

        return redirect()->route('lectures.create')->with('message', 'Įrašas sėkmingai sukurtas.');

        // return view('admin/lectures/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('admin/lectures/edit', compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {

      $this->validateRequest($request);

      // $lecture->name = $request->name;
      // $lecture->description = $request->description;
      // $lecture->save();

      Lecture::updateOrCreate(['id' => $lecture->id], $request->all());

      return redirect()->route('lectures.edit', $lecture->id)->with('message', 'Įrašas sėkmingai atnaujintas.');
    }

    public function validateRequest($request) {
      $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('lectures.index')->with('message', "Įrašas #$lecture->id ($lecture->name) sėkmingai ištrintas.");
    }
}
