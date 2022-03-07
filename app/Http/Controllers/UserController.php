<?php
namespace App\Http\Controllers;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Role;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('auth',['except' =>['show']]);
        $this->middleware('roles:admin',['except' => [ 'edit' , 'update','show' ]]);
    }
    public function index()
    {
        return view('users.index',[
            'users'=>User::all()
        ]);
    }


    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->attach($request->roles);
        return redirect()->route('Usuarios.index');
    }

    public function create()
    {
       $roles=Role::pluck('display_name','id');
       return view('users.create',compact('roles'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('Usuarios.index')->with('info','Usuario Borrado');
    }
    public function show($id)
    {

       $user = User::findOrFail($id);
       return view('users.show',compact('user'));

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        $roles=Role::pluck('display_name','id');
        return view('users.edit',compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        $user->update($request->only('name','email'));
        $user->roles()->sync($request->roles);
        return back()->with('info','Usuario Actualizado');
    }
}