<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        //dd($users);
       return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name', 'id')->all();
        
        return view('admin/users/create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        
        if(trim($request->password)==''){
            $input=$request->except('password');
        }
        else{
            
            $input=$request->all();
            
        }
        
        
        
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['name'=>$name]);

            $input['photo_id'] = $photo->id;


        }
        
        $input['password'] = bcrypt($request->password);
        User::create($input);
        
        
        Session::flash('created_user', 'The user has been created!');
        // User::create($request->all());
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

        $roles = Role::pluck('name', 'id')->all();

        $user = User::findOrFail($id);
    
        return view('admin/users/edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {

        $user=User::findOrFail($id);

        if(trim($request->password)==''){
            $input=$request->except('password');
        }
        else{
            $input=$request->all();
            
        }
        

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['name'=>$name]);

            $input['photo_id'] = $photo->id;


        }
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        Session::flash('updated_user', 'The user has been updated!');
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
        
        
    
        $user=User::findOrFail($id);
        /*unlink(public_path().$user->photo->name);*/
        $user->delete();


        Session::flash('deleted_user', 'The user has been deleted!');

        return redirect('admin/users');


    }
}
