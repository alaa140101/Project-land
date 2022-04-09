<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        
        return view('projects', compact('projects'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('name', 'id')->get();
        return view('projects.create-project', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'user_id' => 'required',
            'body'=> 'required'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
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

    public function edit($id)
    {
        $project = Project::where('id', $id)->first();

        return view('projects.edit-project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $project = Project::where('id', $id)->first();
        
        $project->title = $request->title;
        $project->body = $request->body;

        $project->save();

        return redirect('/projects')->with(
            'success',
            'تم تعديل المشروع بنجاح'
        );
    }
}
