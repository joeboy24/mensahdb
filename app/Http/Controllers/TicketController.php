<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class TicketController extends Controller
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
        return $users;

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
            $add_ticket = Ticket::create([
                'fname' => $request->fname,
                'sname' => $request->sname,
                'phone' => $request->phone,
                'evt_id' => $request->evt_id,
                'ticket_code' => $request->ticket_code,
                'email' => $request->email,
                'qty' => $request->qty,
                'reference' => $request->reference,
                'status' => $request->status,
                'ticket' => $request->ticket,
                'admitted' => $request->admitted,
            ]);

            return response()->json([
                'result' => 'Ticket Purchase Successful'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'An error occured: ' //.$th->getMessage()
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
