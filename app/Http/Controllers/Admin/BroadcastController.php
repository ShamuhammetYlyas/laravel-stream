<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SoapBox\Formatter\Formatter;
use App\Http\Requests\BroadcastRequest;
use Carbon\Carbon;
use Auth;
use App\Models\Broadcast;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use App\Traits\ImageUpload;

class BroadcastController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://172.20.1.24:5080/LiveApp/rest/v2/broadcasts/list/1/50');
		$streams = json_decode($response->getBody()->getContents(), false);
    	return view('admin.index', compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BroadcastRequest $request)
    {
        try {
            $stream_id = (string)Str::uuid();
            $date = Carbon::now();
            $path = base_path()."/storage/json/create-broadcast.json";
            $broadcast_data = json_decode(file_get_contents($path), true);
            $broadcast_data['streamId'] = $stream_id;
            $broadcast_data['name'] = $request->name;
            $broadcast_data['description'] = $request->description;
            $broadcast_data['date'] = strtotime($date);
            $broadcast_data['username'] = Auth::guard('admin')->user()->username;
            $broadcast_data['originAdress'] = $request->ip();
            $broadcast_data['rtmpURL'] = "rtmp://127.0.1.1/LiveApp/".$stream_id;
            $broadcast_data['userAgent'] = $request->header('User-Agent');

            $client = new \GuzzleHttp\Client();
            $response  = $client->request('POST', 'http://172.20.1.24:5080/LiveApp/rest/v2/broadcasts/create', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept'     => 'application/json',
                ],
                'body' => json_encode($broadcast_data),
            ]);

            if ($response->getStatusCode() == 200){
                $broadcast = Broadcast::create([
                    'stream_id' => $stream_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'date' => $date,
                    'username' => Auth::guard('admin')->user()->username,
                    'response' => json_encode($response->getBody()->getContents()),
                    'preview' => 'test'
                ]);

                if($request->hasFile('preview'))
                {
                    $this->storeImage($broadcast, 'streams');
                }
            }
            return redirect()->route('admin.broadcast.index')->withSuccess('Serwis üstünlikli döredildi');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
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
