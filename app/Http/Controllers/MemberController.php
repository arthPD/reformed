<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JavaScript;

class MemberController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        JavaScript::put([
                'members' => $users
         ]);
        return view('blades.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blades.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

            'name' => 'required',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'contact_number' => 'numeric|required|digits:11',
            'address' => 'required',
            'email_address' => 'required',
            'birthday' => 'required|date'

        ]);

        $request->password = \Hash::make($request->password);
        User::create(request(['name','username','password','contact_number','address','email_address','birthday']));

        return redirect('/users')->with('message', ['success', 'New member added!']);
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
        $user = User::findOrFail($id);

        return view('blades.userEdit', compact('user'));
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
        $user = User::findOrFail($id);

        if($user->username !== $request->username){
            $this->validate(request(), [

                'name' => 'required',
                'username' => 'unique:users|min:6e',
                'password' => 'min:6|confirmed',
                'password_confirmation' => 'min:6',
                'contact_number' => 'numeric|required|digits:11',
                'address' => 'required',
                'email_address' => 'required',
                'birthday' => 'required|date'

            ]);
        }else{

             $this->validate(request(), [

                'name' => 'required',
                'username' => 'required|min:6',
                'password' => 'confirmed|nullable|min:6',
                'password_confirmation' => 'required_with:password|nullable|min:6',
                'contact_number' => 'numeric|required|digits:11',
                'address' => 'required',
                'email_address' => 'required',
                'birthday' => 'required|date'

            ]);
        }

        $request->password = \Hash::make($request->password);
        User::find($id)->update(request(['name','username','password','contact_number','address','email_address','birthday']));

        return redirect('/users')->with('message', ['success', 'Account updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
