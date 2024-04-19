<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PHone;
use App\Models\Ticket;
use App\Models\Contact;
use App\Mail\ReminderMail;
use Illuminate\Support\Facades\Mail;
use Session;


class GeneralController extends Controller
{
    // Tickets
    public function getTickets($id) {
        $where = ['evt_id' => $id, 'del' => 'no'];
        $tickets = Ticket::where($where)->get();

        return response()->json([
            'result' => $tickets
            // 'result' => count($tickets).' Records Found'
        ], 200);
    }

    public function addTicket(Request $request) {
        
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
                'message' => 'An error occured: '.$th->getMessage()
            ], 404);
        }

    }

    public function updateTicket (Request $request, $id) {
        
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json([
                'message' => 'Oops..! Ticket not found'
            ], 404);
        }

        try{

            // $ticket->qty = $request->qty;
            $ticket->admitted = $request->admitted;
            $ticket->save();

            return response()->json([
                'result' => "Admission Successful",
                // 'message' => "Admission Successful"
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
            $err = $th->getMessage();
            return response()->json([
                'message' => 'Error..! '.$err
            ], 404);
        }
    }

    // Contacts
    public function getContacts() {
        $where = ['subscription' => 'yes', 'del' => 'no'];
        // $select = ['fname','sname','phone','email','subscription','del']; select($select)->
        $contacts = Contact::where($where)->distinct('phone')->orderBy('fname', 'ASC')->get();

        // return $contacts;

        return response()->json([
            'result' => $contacts,
            'count' => count($contacts)
        ], 200);
    }

    public function importContacts (Request $request) {
        $hold = [];
        // return $res;
        try{

            $hold = array($request[2]);
            // $ticket->admitted = $request->admitted;
            // $ticket->save();

            return response()->json([
                'feedback' => $hold[0],
                // 'feedback' => $request[2],
                // 'message' => "Admission Successful"
            ], 200);

        } catch (\Throwable $th) {
            $err = $th->getMessage();
            return response()->json([
                'message' => 'Error..! '.$err
            ], 404);
        }
    }

    public function addContact(Request $request) {

        // if ($request->email != '' || $request->email != null) {
        //     $search = Contact::where('email', $request->email)->first();
        // }

        // beyk yswe xkcq xblb

        if ($request->phone != '' || $request->phone != null && $request->phone != 'Empty') {
            $search2 = Contact::where('phone', $request->phone)->first();
        }

        $C = $request->phone;
        if (substr($C, 0, 1) == '+') {
            $C = str_replace('+', '', $C);
        }
        if (substr($C, 0, 3) == '233') {
            $C = str_replace('233', '0', $C);
        }
        if (substr($C, 0, 4) == '+233') {
            $C = str_replace('+233', '0', $C);
        }
        
        try {
            if (!$search2) {
                // if ($request->fname == '') {
                //     $fname = 'Sir/Madam';
                // }
                // if ($request->sname == '') {
                //     $sname = '';
                // }
                $add_ticket = Contact::firstOrCreate([
                    // 'fname' => 'Empty',
                    // 'sname' => 'Empty',
                    // 'phone' => $C,
                    // 'email' => 'Empty',
                    'fname' => $request->fname,
                    'sname' => $request->sname,
                    'phone' => $C,
                    'email' => $request->email,
                ]);
            }
            
            return response()->json([
                'result' => 'Contact Added'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'An error occured: '.$th->getMessage()
            ], 404);
        }

    }

    public function updateContact (Request $request, $id) {
        
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'message' => 'Oops..! Contact not found'
            ], 404);
        }

        try{
            $contact->fname = $request->fname;
            $contact->sname = $request->sname;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->subscription = $request->subscription;
            $contact->del = $request->del;
            $contact->save();

            return response()->json([
                'result' => "Contact Update Successful",
                // 'message' => "Admission Successful"
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
            $err = $th->getMessage();
            return response()->json([
                'message' => 'Error..! '.$err
            ], 404);
        }
    }




    
    public function unsubscribe(Request $request, $id) {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->subscription = 'no';
            $contact->save();
        }
        return view('unsubscribe');
    }


    public function ReminderMailFunc(Request $request, $id) {
        
        // Session::put('mailTo', $request);
        Session::put('mailMsg', $request->emailText);
        $emails = '';

        foreach ($request->emails as $item) {
            $emails = $emails."'".$item."', ";
        }

        try {
            
            if ($request->emails != '' || $request->emails != null || $request->emails != 'Empty') {
                # code...
                
                for ($i=0; $i < count($request->emails); $i++) { 
                        // $emails = $emails."'".$item."', ";

                    if (str_contains($request->emails[$i], '@')) {
                        Session::put('mailTo', $request->fnames[$i]);
                        Mail::to($request->emails[$i])->send(new ReminderMail);
                    }
                }
            }

            return response()->json([
                'result' => 'Accepted',
                'value' => "Email sent to ".$emails,
                'value2' => "Email Text ".$request->emailText
                // 'value' => 'Email sent to '.$request->fname,
                // 'value2' => 'Email sent to '.$id
            ], 200);

        } catch (\Throwable $th) {
            $err = $th->getMessage();
            return response()->json([
                'value' => 'Not sent '.$th,
            ], 404);
        }

    }


    public function ReminderMailFunc2(Request $request, $id) {
        // return view('mail.event_notice');
        // // $data = json_decode($request);
        // Session::put('mailTo', $request);
        // Session::put('mailMsg', $msg);
        // // $data = json_decode($request[0]);
        Session::put('mailTo', $request);
        Session::put('mailMsg', $request->new);
        try {
            // // foreach ($request as $item) {
                if ($request->email != '' || $request->email != null) {
                    # code...
                    Mail::to($request->email)->send(new ReminderMail);
                }
            // //     $a = $item->email;
            // // }
            return response()->json([
                'result' => 'Accepted',
                'value' => 'Email sent to '.$request->fname
            ], 200);

        } catch (\Throwable $th) {
            $err = $th->getMessage();
            return response()->json([
                'value' => 'Not sent',
                // 'value' => 'Not sent to '.$request->mail,
                // 'message' => 'Error Accepting..! '.$err
            ], 404);
        }

    }


    public function PhonesUploadFunc() {
        $phones = Phone::all();

        foreach ($phones as $item) {
            # code...
            $find = Contact::where('phone', $item->phone)->latest()->first();
            if (!$find) {
                # code...
                // return $find;
                $insert = Contact::firstOrCreate([
                    'fname' => $item->fname,
                    'sname' => $item->sname,
                    'phone' => $item->phone,
                    'email' => $item->email,
                ]);
            }
        }
        return 'Done..!';
    }

}
