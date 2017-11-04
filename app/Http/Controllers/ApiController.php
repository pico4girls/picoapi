<?php

namespace Pico\Http\Controllers;

use Illuminate\Http\Request;
use Pico\Message;
use Pico\User;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{

    public function test(Request $request)
    {

        return response()->json(['message' => 'Welcome Back']);
    }

    public function test2(Request $request)
    {
      Message::create([ 'body' => 'test message created', 'rfid_tag' => '12345']);

      $client = new Client(); //GuzzleHttp\Client
      $result = $client->post('https://hooks.slack.com/services/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', [
        'form_params' => [
            'channel' => 'messages',
            'username' => 'picobot',
            'text' => 'test message created'
        ]
      ]);

      return response()->json(['message' => 'message created']);
    }

    public function firstLogin(Request $request){
        return response()->json(['message' => 'first login']);
    }

    public function noRfidTag(Request $request){
        return response()->json(['message' => 'no_rfid_tag']);
    }

    public function msgs(Request $request)
    {
      User::where('rfid_tag', '=', $request->get('rfid_tag'))->find();
      // return response()->json([
      //
      // ]);
    }

    public function slackPost(Request $request)
    {
      if($request->get('token') == "e6NCpDzZFUPdNoxgx11PEinl")
      {
        Message::create(['body' => $request->get('text'), 'rfid_tag' => '12345']);
      //Message::create([ 'body' => 'Slack posted a message', 'rfid_tag' => '12345']);

        return response()->json([
          "text" => "System: Message delivered, thank you!"
        ]);
      }
    }
}
