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

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create-project');
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
        $this->validate($request, [
            'title' => 'required',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);


        return redirect()->back()->with(
            'success',
            'تمت اضافة مشروع جديد'
        );
    }
    public function show(Project $project)
    {

        return view('projects.show-project', compact('project'));
    }
}
