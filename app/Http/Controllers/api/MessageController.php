<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Komentar;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Ticket::all();
        return response()->json([
            'data' => $ticket
        ]);
    }

    public function message($ticket_id){
        $message = Komentar::where('ticket_id', $ticket_id)->with('user')->orderBy('created_at','desc')->get();
        return response()->json([
            'data' => $message
        ]);
    }

    public function store(Request $request, $ticket_id){
        $message = Komentar::create([
            'user_id' => auth()->user()->id,
            'komentar' => $request->komentar,
            'ticket_id' => $ticket_id,
            'parent' => 0
        ]);
    }
}
