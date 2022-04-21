<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    use ImageUploadTrait;

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
        $projects = $this->project::orderBy('created_at', 'desc')->paginate(20);

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
            'user_id' => 'required',
            'title_ar' => 'required',
            'project_image' => 'image|required',
            'body_ar'=> 'required',
            'title_en' => 'required',
            'body_en'=> 'required',
        ]);

        $project = new Project;       

        $project->user_id = $request->user_id;
        $project->project_image = $this->uploadImage($request->project_image,'storage/images/projects/');
        $project->title_ar = $request->title_ar;
        $project->body_ar = $request->body_ar;
        $project->title_en = $request->title_en;
        $project->body_en = $request->body_en;

        $project->save();

        session()->flash('flash_message', 'تم إضافة المشروع بنجاح');

        return redirect(route('projects.all'));
    }
    
    public function edit($id)
    {
        $project = Project::where('id', $id)->first();
        $users = User::select('name', 'id')->get();

        return view('projects.edit-project', compact('project','users'));
    }

    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title_ar' => 'required',
            'project_image' => 'image|required',
            'body_ar'=> 'required',
            'title_en' => 'required',
            'body_en'=> 'required',
        ]);

        $project->update([
           'user_id' => $request->user_id,
           'project_image' => $this->uploadImage($request->project_image,'storage/images/projects/'),
           'title_ar' => $request->title_ar,
           'body_ar' => $request->body_ar,
           'title_en' => $request->title_en,
           'body_en' => $request->body_en,
        ]);
        
        session()->flash('flash_message', 'تم تعديل المشروع بنجاح');

        return redirect(route('projects.all'));
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->first();
        
        $project->delete();

        session()->flash('flash_message', 'تم حذف المشروع بنجاح');

        return back();
    }
}
