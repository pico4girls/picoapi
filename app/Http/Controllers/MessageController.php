<?php

namespace Pico\Http\Controllers;

use Illuminate\Http\Request;
use Pico\Message;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $messages = Message::get();

      return response()->json($messages);
        //return
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUnread()
    {
      $messages = Message::where('read', '=', 0)->get();

      Message::where('read', '=', 0)->update(['read' => 1]);

      return response()->json($messages);
        //return
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

      $validatedData = $request->validate([
        'rfid_tag' => 'required',
        'body' => 'required',
      ]);

      Message::create(['body' => $validatedData['body'], 'rfid_tag' => $validatedData['rfid_tag'] ]);
      //$validatedData['rfid_tag']
      $client = new Client();
      $response = $client->post('https://hooks.slack.com/services/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', [
          RequestOptions::JSON => [
            'text' => $validatedData['body'],
            'channel' => 'messages',
            'username' => 'picouser'
          ]
      ]);

      return response()->json(['message' => 'Message saved to database and sent to slack.']);
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
