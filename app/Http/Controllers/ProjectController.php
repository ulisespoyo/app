<?php
namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\SaveProjectRequest;
use App\Project;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ProjectController extends Controller
{

    public function index()
    {
        return view('projects.index',[
            'newProject' => new Project,
            'projects'=>Project::with('category')->latest()->paginate(),
            'deletedProjects'=> Project::onlyTrashed()->get()
        ]);
        // withTrashed() muestra todos
        // onlyTrashed() muestra solo eliminados

    }

    public function show(Project $project)
    {
        return  view('projects.show',[
          'project' =>  $project
      ]);
    }

    public function create()
    {
     $this->authorize('create', $project = new Project);

     return view('projects.create',[
        'project'=> $project,
        'categories'=> Category::pluck('name','id')
    ]);

 }

 public function store(SaveProjectRequest $request)
 {
    $project= new Project( $request->validated());
    $this->authorize('create', $project);
    $project->image = $request->file('image')->store('images');
    $project->save();

    $this->optimizeImage($project);

    return redirect()->route('projects.index')->with('status','El proyecto fue creado con exito');
}

public function edit(Project $project)
{
    $this->authorize('update', $project);
    return  view('projects.edit',[
      'project' =>  $project,
      'categories'=> Category::pluck('name','id')
  ]);
}

public function update(Project $project , SaveProjectRequest $request)
{
   $this->authorize('update', $project);
   if($request->hasFile('image'))
   {
    Storage::delete($project->image);
    $project->fill( $request->validated());
    $project->image = $request->file('image')->store('images');
    $project->save();

}else{
    $project->update( array_filter($request->validated()) );
}

$this->optimizeImage($project);

return redirect()->route('projects.show',$project)->with('status','El proyecto fue actualizado con exito');

}

public function destroy(Project $project)
{
   $this->authorize('delete', $project);
   $project->delete();
   return redirect()->route('projects.index')->with('status','El proyecto fue eliminado con exito');
}

public function optimizeImage($project)
{
    $image = Image::make(Storage::get($project->image))
    ->widen(600)->limitColors(255)->encode();
    Storage::put($project->image,(string) $image);
}


public function restore( $projectUrl)
{
    $project = Project::withTrashed()->where('url',$projectUrl)->firstOrFail();
    $this->authorize('restore', $project);
    $project->restore();
    return redirect()->route('projects.index')->with('status','El proyecto fue restaurado con exito');
}


public function forceDelete( $projectUrl) {
    $project = Project::withTrashed()->where('url',$projectUrl)->firstOrFail();
    $this->authorize('forceDelete', $project);
    Storage::delete($project->image);
    $project->forceDelete();
    return redirect()->route('projects.index')->with('status','El proyecto fue eliminado permanentemente');
}



}
