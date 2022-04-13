<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public $project;
    
    public function __construct(Project $project)
    {
        $this->project = $project;
    }


    public function index()
    {
        if(auth()->user()){
            $projects = $this->project::where('user_id', auth()->user()->id)->get();
        }else{
            abort(403);
        }
        
        return view('projects.my-projects', compact('projects'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->project->find($id);

        return view('projects.show-project', compact('project'));
    }

    public function all()
    {
        $projects = $this->project::paginate(20);

        return view('projects.all-projects', compact('projects'));
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

        $project = new Project;

        $project->title = $request->title;
        $project->body = $request->body;
        $project->user_id = $request->user_id;

        $project->save();

        return redirect()->back()->with('success','تمت اضافة مشروع جديد');
    }
    
    public function edit($id)
    {
        $project = Project::where('id', $id)->first();

        return view('projects.edit-project', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $project->update([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
        
        return redirect()->back()->with(
            'success',
            'تم تعديل المشروع بنجاح'
        );
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->first();
        
        $project->delete();

        return back()->with('success', 'تم حذف مقطع الفيديو بنجاح');
    }
}
