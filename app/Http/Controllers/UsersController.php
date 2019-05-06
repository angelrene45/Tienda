<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);

        return view('Admin.users.index')->with(['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
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
        'name' => 'required|min:4|max:120',
        'email' => 'required|unique:users|max:255',
        'password' =>'required|min:4|max:120'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request['contraseña']);
        $user->save();

        flash('El usuario ' .$user->name. ' se ha agregado satisfactoriamente')->success()->important();
        return redirect('admin/users');
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
    public function edit($id)
    {
        $user=User::find($id);

        return view('Admin.users.edit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $this->validate($request, [
        'name' => 'required|min:4|max:120',
        'email' => Rule::unique('users')->ignore($user->id),
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        $user->save();

        flash('El usuario ' .$user->name. ' se ha actualizado satisfactoriamente')->success()->important();
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        flash('Se ha eliminado el usuario '. $user->name .' satisfactoriamente!')->warning()->important();
        return redirect('admin/users');
    }
}
