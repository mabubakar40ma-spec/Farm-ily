<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChatController extends Controller
{
    public function chatWithUser(Listing $listing)
    {
        $receiver = $listing->user;
        return view('frontend.dashboard.chat.chatbox', compact('receiver', 'listing'));
    }

    public function fetchMessages($userId)
    {
        $messages = Message::where(function ($q) use ($userId) {
            $q->where('from_user_id', auth()->id())->where('to_user_id', $userId);
        })->orWhere(function ($q) use ($userId) {
            $q->where('from_user_id', $userId)->where('to_user_id', auth()->id());
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
            'listing_id' => $request->listing_id,
            'message' => $request->message,
        ]);

        return response()->json($message);
    }
    public function conversations()
    {
        $userId = auth()->id();

        $messages = Message::where('from_user_id', $userId)
            ->orWhere('to_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $userIds = $messages->map(function ($msg) use ($userId) {
            return $msg->from_user_id == $userId ? $msg->to_user_id : $msg->from_user_id;
        })->unique();

        $users = \App\Models\User::whereIn('id', $userIds)->get();
        return view('frontend.dashboard.chat.conversations', compact('users'));
    }

    public function chatDirect(User $user)
    {
        return view('frontend.dashboard.chat.chatbox', [
            'receiver' => $user,
            'listing' => null // you can handle `null` in the view
        ]);
    }
}