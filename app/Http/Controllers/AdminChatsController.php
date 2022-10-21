<?php

namespace App\Http\Controllers;

use App\Models\CertificateDescription;
use App\Models\Enrollment;
use App\Models\Message;
use App\Models\Replay;
use App\Models\User;
use App\Events\MessageReplay;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Pusher\Pusher;

class AdminChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data['certs']=CertificateDescription::with('enrollments')->get();
        $data['page']='chat';
        return view('admin.chat.chat')->with($data);
    }

    public function chat($id){
        $data['page']='chat';
        $data['enrolls'] = Enrollment::with('user')->with('cert')->where('certificate_descriptions_id',$id)->get();
        return view('admin.chat.chat-certifcate')->with($data);
    }


    public function fetchMessages($userid,$certid)
    {
        $message = Message::where('from_user',$userid)->where('certificate_descriptions_id',$certid)->get();
        $replay = Replay::where('to_user',$userid)->where('certificate_descriptions_id',$certid)->get();
        $data = [$message,$replay];
        $data = Arr::collapse($data);
        $keys = array_column($data, 'created_at');
        array_multisort($keys, SORT_ASC, $data);
        $return = [];
        foreach ($data as $message) {
            $return[] = view('admin.chat.message-line')->with(['message'=>$message,'user'=>$userid])->render();
        }
        return response()->json(['state' => 1, 'messages' => $return]);
    }


    public function postSendMessage(Request $request)
    {
        if (!$request->to_user || !$request->message) {
            return;
        }
        $message = new Replay;
        $message->to_user = $request->to_user;
        $message->message = $request->message;
        $message->certificate_descriptions_id = $request->cert;
        $message->save();
        // prepare some data to send with the response
        $message->dateTimeStr = date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()));
        $message->dateHumanReadable = $message->created_at->diffForHumans();
        $message->fromUserName = auth()->user()->name;
        $message->from_user_id = auth()->user()->id;
        $message->toUserName = $message->user->name;
        $message->to_user_id = $request->to_user;
        broadcast(new MessageReplay(auth()->user(), $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
//    public function getOldMessages(Request $request)
//    {
//        if(!$request->old_message_id || !$request->to_user)
//            return;
//        $message = Message::find($request->old_message_id);
//        $lastMessages = Message::where(function($query) use ($request, $message) {
//            $query->where('from_user', Auth::user()->id)
//                ->where('to_user', $request->to_user)
//                ->where('created_at', '<', $message->created_at);
//        })
//            ->orWhere(function ($query) use ($request, $message) {
//                $query->where('from_user', $request->to_user)
//                    ->where('to_user', Auth::user()->id)
//                    ->where('created_at', '<', $message->created_at);
//            })
//            ->orderBy('created_at', 'ASC')->limit(10)->get();
//        $return = [];
//        if($lastMessages->count() > 0) {
//            foreach ($lastMessages as $message) {
//                $return[] = view('message-line')->with('message', $message)->render();
//            }
//
//            PusherFactory::make()->trigger('chat', 'oldMsgs', ['to_user' => $request->to_user, 'data' => $return]);
//        }
//        return response()->json(['state' => 1, 'data' => $return]);
//    }
}
