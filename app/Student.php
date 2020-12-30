<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
    public function modules(){
        return $this->belongsToMany(Module::class, 'student_module');
    }
}
