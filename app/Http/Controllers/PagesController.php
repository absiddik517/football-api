<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function lineLeague(){
      $url = "https://api.betting-api.com/1xbet/football/line/leagues";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      
      
      return view('pages.index', [
        'results' => json_decode($result, true)
      ]);
    }
    
    public function liveLeague(){
      $url = "https://api.betting-api.com/1xbet/football/live/leagues";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      
      
      return view('pages.live', [
        'results' => json_decode($result, true)
      ]);
    }
    
    public function leagueLineMatches($id, $league_name){
      $url = "https://api.betting-api.com/1xbet/football/line/league/$id/matches";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      //dd(json_decode($result, true));
      
      return view('pages.league.line',[
        'league_name' => $league_name,
        'matches' => json_decode($result, true),
      ]);
    }
    
    public function leagueLiveMatches($id, $league_name){
      $url = "https://api.betting-api.com/1xbet/football/live/league/$id/matches";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      //dd(json_decode($result, true));
      
      return view('pages.league.live',[
        'league_name' => $league_name,
        'matches' => json_decode($result, true),
      ]);
    }
    
    public function liveMatch($id){
      $url = "https://api.betting-api.com/1xbet/football/live/$id";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      //dd(json_decode($result, true));
      
      return view('pages.bet.live', [
        'result' => json_decode($result, true)
      ]);
    }
    public function lineMatch($id){
      $url = "https://api.betting-api.com/1xbet/football/line/$id";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Authorization: '. env('BET_API_KEY'),
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);
      ///dd(json_decode($result, true));
      
      return view('pages.bet.line', [
        'result' => json_decode($result, true)
      ]);
    }
    
    
    
    
    
    
    
}
