<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        // return $users;

        return response()->json([
            'result' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $add_user = User::firstOrCreate([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => $request->password,
                'urole' => $request->urole,
                'photo' => $request->photo,
                // 'del' => $request->del,
            ]);

            return response()->json([
                'result' => 'User successfully added'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            $err = $th->getMessage();
            if (str_contains($th->getMessage(), '1062 Duplicate entry')) {
                $err = 'Email already in use by another user';
            }
            
            return response()->json([
                'message' => 'Error..! '.$err
            ], 404);
        }
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
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Oops..! User not found'
            ], 404);
        }

        return response()->json([
            'result' => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'Oops..! User not found'
            ], 404);
        }

        try{

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            // $user->password = $request->password;
            $user->urole = $request->urole;
            // $user->photo = $request->photo;
            $user->del = $request->del;
            $user->save();

            return response()->json([
                'result' => $user->name."'s record successfully updated"
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
            $err = $th->getMessage();
            return response()->json([
                'message' => 'Error..! '.$err
            ], 404);
        }
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
