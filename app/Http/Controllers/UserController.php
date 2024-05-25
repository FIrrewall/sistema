<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('users_index'),403);
        $users = User::all();

        $usuario = auth()->user();

        //return $usuario;
        //$permissions = Permission::all()->pluck('name', 'id');
        return view('users.index', compact('users'));

        //return dd($usuario->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('users_create'),403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$role = Role::create($request->only('name'));
        //$role->syncPermissions($request->input('permissions',[]));
        
        $user = User::create($request->only('name','email') 
            + [
            'password' => bcrypt($request->input('password')),
        ]);

        $roles = $request->input('roles',[]);
        $user->syncRoles($roles); 
        return redirect('users')->with('nuevo','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('users_edit'),403);
        $roles = Role::all()->pluck('name','id');
        $user->load('roles');
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->only('name','email'));
        $roles = $request->input('roles',[]);
        //$roles->permissions()->sync($request->input('permissions',[]));
        $user->syncRoles($roles);

        return redirect('users')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('users_destroy'),403);
        /*if (auth()->user()->id = $user->id)
        {
            return redirect('users');            
        }*/
        //$user->delete();
        User::destroy($id);
        return redirect('users')->with('eliminar','ok');
    }

    /*public function mostrar()
    {
        $usuario = auth()->user();
        return view('users.cambio',compact('usuario'));
    }


    public function cambioPassword(ChangePasswordRequest $request, User $user)
    {
        dd();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return view('users');
    }*/
}
