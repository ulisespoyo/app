<?php

namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function index()
    {
       return view('roles.index',['roles'=>Role::all()]);
    }

    public function create()
    {
        $rol = new Role;
        return view('roles.create',[
            'rol'=> $rol,
        ]);
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->create($request->except('_token'));
        return redirect()->route('Roles.index')->with('status','El Rol fue creado con exito');
    }


    public function show($id)
    {
        $rol = Role::findOrFail($id);
        return view('roles.show',compact('rol'));
    }


    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view('roles.edit',compact('rol'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('Roles.index')->with('status','El Rol fue actualizado con exito');
    }


    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect()->route('Roles.index')->with('info','Rol Borrado');
    }
}
