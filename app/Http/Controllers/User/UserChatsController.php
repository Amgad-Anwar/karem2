<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Message;
use App\Models\Replay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserChatsController extends Controller
{
    //
    function index(){
        $data['page'] = 'chat';
        $data['enrolls'] = Enrollment::with('cert')->where('users_id',auth()->user()->id)->get();
        return view('users.chat')->with($data);
    }
    function chat($id){
        $data['page'] = 'chat';
        $data['admin'] = User::where('type',1)->first();
        $data['cert_id'] = $id;
        return view('users.chat-certifcate')->with($data);
    }
    public function postSendMessage(Request $request)
    {
        if (!$request->from_user || !$request->message) {
            return;
        }
        $message = new Message;
        $message->from_user = $request->from_user;
        $message->message = $request->message;
        $message->certificate_descriptions_id = $request->cert;
        $message->save();
        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateHumanReadable = $message->created_at->diffForHumans();
        $message->fromUserName = auth()->user()->name;
        $message->from_user_id = auth()->user()->id;
        $message->toUserName = "Admin";
        $message->to_user_id = User::where('type',1)->first()->id;
        broadcast(new MessageSent(auth()->user(), $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function fetchMessages($certid)
    {
        $message = Message::where('from_user',auth()->user()->id)->where('certificate_descriptions_id',$certid)->get();
        $replay = Replay::where('to_user',auth()->user()->id)->where('certificate_descriptions_id',$certid)->get();
        $data = [$message,$replay];
        $data = Arr::collapse($data);
        $keys = array_column($data, 'created_at');
        array_multisort($keys, SORT_ASC, $data);
        $return = [];
        foreach ($data as $message) {
            $return[] = view('users.message-line')->with(['message'=>$message,'user'=>auth()->user()->id])->render();
        }
        return response()->json(['state' => 1, 'messages' => $return]);
    }

}
