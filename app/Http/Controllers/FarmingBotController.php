<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmingQuestion;
use App\Models\ChatMessage;
use Illuminate\Log\log;

class FarmingBotController extends Controller
{
    public function respond(Request $request)
    {
        try {
            $userMsg = strtolower(trim($request->message));

            $chat = \App\Models\ChatMessage::create([
                'user_message' => $userMsg
            ]);

            $greetings = ['hello', 'hi', 'how are you', 'hey'];
            $weatherQs = ['what is the weather', 'is it raining'];

            if (in_array($userMsg, $greetings)) {
                $response = 'Hello! How can I help you with farming today?';
            } elseif (in_array($userMsg, $weatherQs)) {
                $response = 'I am not connected to live weather, but I suggest checking your local weather app!';
            } else {
                $match = \App\Models\FarmingQuestion::with('answers')->get()->first(function ($q) use ($userMsg) {
                    return str_contains($userMsg, strtolower($q->question));
                });

                if ($match && $match->answers->count()) {
                    $response = $match->answers->random()->answer;
                } else {
                    $response = "Sorry, I didn't get that. Try asking something about farming.";
                }
            }

            $chat->bot_response = $response;
            $chat->save();

            return response()->json(['response' => $response]);
        } catch (\Throwable $e) {
            \Log::error('ChatBot Error: ' . $e->getMessage());

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
