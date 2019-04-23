<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['grade', 'lecture_id', 'student_id'];

    public function lecture() {
      return $this->hasOne('App\Lecture', 'id', 'lecture_id');
    }


    // public function lecture() {
    //
    // }
}
