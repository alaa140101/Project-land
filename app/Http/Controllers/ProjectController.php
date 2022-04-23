<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $this->validate($request, $rules, $messages);
       

        $project = new Project;       

        $project->user_id = $request->user_id;
        $project->project_image = $this->uploadImage($request->project_image,'storage/images/projects/');
        $project->title_ar = $request->title_ar;
        $project->body_ar = $request->body_ar;
        $project->title_en = $request->title_en;
        $project->body_en = $request->body_en;

        $project->save();

        session()->flash('flash_message', trans('messages.Project Added successfully'));

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
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $this->validate($request, $rules, $messages);

        if ($request->has('project_image')) {
            Storage::disk('public')->delete($project->project_image);
            $request->project_image = $this->uploadImage($request->project_image,'storage/images/projects/');
            $project->project_image = $request->project_image;
        }


        $project->user_id = $request->user_id;
        $project->title_ar = $request->title_ar;
        $project->body_ar = $request->body_ar;
        $project->title_en = $request->title_en;
        $project->body_en = $request->body_en;

        $project->save();
        
        session()->flash('flash_message', trans('messages.Project Updated successfully'));

        return redirect(route('projects.all'));
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->first();
        
        $project->delete();

        Storage::disk('public')->delete($project->project_image);

        session()->flash('flash_message', trans('messages.Project deleted successfully'));

        return redirect(route('projects.all'));
    }

    protected function getRules()
    {
        return [
            'user_id' => 'required|numeric',
            'title_ar' => 'required',
            'project_image' => 'image|mimes:jpeg,png',
            'body_ar'=> 'required',
            'title_en' => 'required',
            'body_en'=> 'required',
        ];
    }
    protected function getMessages()
    {
        return [
            'user_id.required' => trans('messages.Project user id required'),
            'user_id.numeric' =>  trans('messages.Project user id required'),
            'title_ar.required' => trans('messages.Project Title ar'),
            'project_image.image' => trans('messages.Project photo required'),
            'project_image.mimes' => trans('messages.Project photo type'),
            'body_ar.required' => trans('messages.Project details ar'),
            'title_en.required' => trans('messages.Project Title en'),
            'body_en.required' => trans('messages.Project details en'),
        ];
    }
}
