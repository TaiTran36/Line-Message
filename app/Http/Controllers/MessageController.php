<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $jsonData = $request->all();

        Log::info("####### Info events from LINE: ", $request->input('events'));

        $replyToken = $jsonData['events'][0]['replyToken'];
        $type = $jsonData['events'][0]['type'];
        $lineUserId = $jsonData['events'][0]['source']['userId'];
        $destination =  $jsonData['destination'];

        if($type == 'follow'){
            $data = [
                'type' => $type,
                'reply_token' => $replyToken,
                'line_user_id'     => $lineUserId,
                'destination' => $destination,
            ];

//            LogLine::writeLog($data);

//            $infoAccountLine = json_decode(HttpRequestHelper::getProfileUserId($lineUserId), true);
//            $dataSend = \Helper::pre_text($content);
//
//            $dataSend = MessageServiceProvider::prepareMessageSendUserId($lineUserId, $dataSend);
//
//            Log::error('####### Data send: ' . json_encode($dataSend));

            //send message to line_user_id after scan qr by LINE account
//            \Helper::pushMessage($dataSend);

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
