@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Football</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Upcomming</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $league_name ?? 'League Matches' }}</li>
  </ol>
</nav>


<div class="row gy-2">
  @foreach($matches as $match)
  @if(!$match['isComposite'] && !$match['isSpecial'])
    <div class="col-12">
      <div class="p-3 border shadow rounded-1">
        <a href="{{ route('bet.line', $match['id']) }}" class="text-decoration-none" style="color: #000;">
        <div class="d-flex justify-content-between mb-2">
          <span>{{ $match['league']['name'] }}</span>
          <span><i class="fa fa-futbol-o" aria-hidden="true"></i></span>
        </div>
        
        <div class="d-flex justify-content-between fs-5">
          <div class="flex-grow-1 d-flex justify-content-end px-3">{{ $match['team1'] }}</div>
          <div class="text-center">VS</div>
          <div class="flex-grow-1 px-3">{{ $match['team2'] }}</div>
        </div>
        
        <div class="d-flex justify-content-center text-muted font-monospace fs-6">
          {{ date('d-m-Y h:i A', strtotime($match['date_start'])) }}
        </div>
        </a>
        <div class="overflow-auto d-flex gx-2">
          <div class="col-10 px-3">
            <div class="p-2">
              <div class="text-center border-bottom mb-2">1X2</div>
              <div class="d-flex justify-content-between">
                <span class="badge bg-dark">W1 <b>{{ $match['markets']['win1']['v'] }}</b></span>
                <span class="badge bg-dark">X <b>{{ $match['markets']['winX']['v'] }}</b></span>
                <span class="badge bg-dark">W2 <b>{{ $match['markets']['win2']['v'] }}</b></span>
              </div>
            </div>
          </div>
          <div class="col-10 px-3">
            <div class="p-2">
              <div class="text-center border-bottom mb-2">Double chance</div>
              <div class="d-flex justify-content-between">
                <span class="badge bg-dark">1X <b>{{ $match['markets']['win1X']['v'] }}</b></span>
                <span class="badge bg-dark">12 <b>{{ $match['markets']['win12']['v'] }}</b></span>
                <span class="badge bg-dark">2X <b>{{ $match['markets']['winX2']['v'] }}</b></span>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  @endif
  @endforeach
    
    
  </div>



@endsection