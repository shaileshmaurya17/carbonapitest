<?php

namespace App\Http\Controllers;

use App\carbonapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Exception;
use DB;
use Auth;


class CarbonapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     * 
     */


     public function index()
     {
        $data['result'] = carbonapi::where('userid',Auth::Id())->get();
        return view('result',$data);
     }
    public function getcarbonapi(Request $request )
    {    

        try{
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api.triptocarbon.xyz/v1/footprint?activity=$request->activity&activityType=$request->activityType&fuelType=$request->fuelType&country=$request->country&mode=$request->mode";
        $res = $client->request('GET', $url );
        $carbonres =  $res->getBody()->getContents();
        $minutes = 24*60*30;
        // Cache::put('carbonres', $carbonres, $minutes);
        $value = Cache::remember('carbonres', $minutes, function () {
            return DB::table('carbonapis')->get();
        });
        // $value = Cache::get('carbonres');     
        return json_decode($carbonres, true);
        }  catch (Exception $e) {
            report($e);
    
            return false;
        }

        $carbon = carbonapi::Create(
            
            [ 'userid' => Auth::Id(),'activity' => $request->activity,'activityType' => $request->activityType, 'fuelType' => $request->fuelType,'country' =>$request->country , 'mode' =>$request->mode,'response'=> $carbonres,]
        );
    }
}
