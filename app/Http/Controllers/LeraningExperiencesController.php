<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningExperience;

class LeraningExperiencesController extends Controller
{
    //
    public function index () {
        $learningExperiences = LearningExperience::all();
        return response()->json($learningExperiences);
    }

    public function store (Request $request)
    {
       $data = $request->validate([
        'name' => 'required',
        'rating' => 'required'
       ]); 

       LearningExperience::create($data);
    }
 }
