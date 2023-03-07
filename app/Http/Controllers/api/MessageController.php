<?php

namespace App\Http\Controllers\api;

use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Komentar;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ticket = Ticket::find($id);
        return response()->json([
            'data' => $ticket
        ]);
    }

    public function message($ticket_id){
        $message = Komentar::where('ticket_id', $ticket_id)->with('user')->get();
        return response()->json([
            'data' => $message
        ]);
    }

    public function store(Request $request, $ticket_id){
        // $message = Komentar::create([
        //     // 'user_id' => auth()->user()->id,
        //     'user_id' => $request->user_id,
        //     'komentar' => $request->komentar,
        //     'ticket_id' => $ticket_id,
        //     'parent' => 0
        // ]);
        $message = auth()->user()->komentar()->create([
            'komentar' => $request->komentar,
            'ticket_id' => $ticket_id,
            'parent' => 0
        ]);
        MessageCreated::dispatch($message->load('user'));
    }

    public function user(){
        $user = auth()->user()->id;
        
        return response()->json([
            'data' => $user
        ]);
    }
}
