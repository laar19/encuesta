<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        return redirect()->route('search_user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        $array = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            //'role'      => $request->role
        );
                
        try {
            User::create($array);
            return redirect()->back()->with(['message' => 'Usuario creado correctamente', 'alert' => 'alert-success']);
        }
        catch(\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            
            if($errorCode == '7') {
                return redirect()->route('user.create')->with(['message' => 'El correo ya existe', 'alert' => 'alert-danger']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datas  $datas
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        $array = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            //'role'      => $request->role
        );
        
        $user = User::findOrFail($id);
        $user->update($array);
        
        return redirect()->route('user.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('user.index');
    }
    
    function search(Request $request) {
        if(!isset(Auth::user()->email)) {
            return redirect()->route('login');
        }
        
        $search = $request->input('q');
        
        if($search != "") {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orderBy('created_at', 'desc');
            })->paginate(10);
            $users->appends(['q' => $search]);
        }
        else {
            $users = User::paginate(10);
        }
        return view('user.index')->with('users', $users);
    }
}
