<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $chunks = $projects->chunk(2);
        
        // foreach ($chunks as $chunk) {
            //    dd($chunk[0]->email);
            // };
            
            return view('projects', compact('projects'));
    }
}
