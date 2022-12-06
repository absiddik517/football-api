@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Football</a></li>
    <li class="breadcrumb-item active" aria-current="page">Line</li>
  </ol>
</nav>


<div class="wrapper">
  <div class="px-2 py-3 text-white" style="background: #2B547E;">
    <div class="d-flex justify-content-between">
      <a href="{{ url()->previous() }}" class="text-white"><i class="fa fa-arrow-left"></i></a>
      <span>{{ $result['title'] }}</span>
    </div>
    
    <div class="text-center mb-3">Football</div>
    
    <div class="container-fluid mb-3">
      <div class="row d-flex align-items-center text-dark">
        <div class="col bg-white p-2 rounded-1">{{ $result['team1'] }}</div>
        <div class="col-2 bg-white rounded-1 shadow d-flex justify-content-center align-items-center py-3">
          {{ $result['score1'] }} - {{ $result['score2'] }}
        </div>
        <div class="col bg-white p-2 rounded-1 d-flex justify-content-end">{{ $result['team2'] }}</div>
      </div>
    </div>
    
    <div class="text-center mb-4">
      {{ \Carbon\Carbon::parse($result['date_start'])->format('d-m-Y h:i A') }}
    </div>
  </div>
  
  <div>
    <div class="accordion">
    @if(isset($result['markets']['win1']) && isset($result['markets']['win2']) && isset($result['markets']['winX']))
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading-teamWin">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-teamWin" aria-expanded="true" aria-controls="panelsStayOpen-teamWin">
            1X2
          </button>
        </h2>
        <div id="panelsStayOpen-teamWin" class="accordion-collapse collapse show" aria-labelledby="heading-teamWin">
          <div class="accordion-body">
            <div class="row">
              <div class="col d-flex justify-content-between p-2" style="background: #ddd; border-right: 1px solid #666;">
                <span class="text-muted">W1</span>
                <strong>{{ $result['markets']['win1']['v'] }}</strong>
              </div>
              <div class="col d-flex justify-content-between p-2" style="background: #ddd; border-right: 1px solid #666;">
                <span class="text-muted">X</span>
                <strong>{{ $result['markets']['winX']['v'] }}</strong>
              </div>
              <div class="col d-flex justify-content-between p-2" style="background: #ddd;">
                <span class="text-muted">W2</span>
                <strong>{{ $result['markets']['win2']['v'] }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    
    @if(isset($result['markets']['win1X']) && isset($result['markets']['win12']) && isset($result['markets']['winX2']))
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading-doublechance">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-doublechance" aria-expanded="true" aria-controls="panelsStayOpen-doublechance">
            Double chance
          </button>
        </h2>
        <div id="panelsStayOpen-doublechance" class="accordion-collapse collapse show" aria-labelledby="heading-doublechance">
          <div class="accordion-body">
            <div class="row">
              <div class="col d-flex justify-content-between p-2" style="background: #ddd; border-right: 1px solid #666;">
                <span class="text-muted">1X</span>
                <strong>{{ $result['markets']['win1X']['v'] }}</strong>
              </div>
              <div class="col d-flex justify-content-between p-2" style="background: #ddd; border-right: 1px solid #666;">
                <span class="text-muted">12</span>
                <strong>{{ $result['markets']['win12']['v'] }}</strong>
              </div>
              <div class="col d-flex justify-content-between p-2" style="background: #ddd;">
                <span class="text-muted">2X</span>
                <strong>{{ $result['markets']['winX2']['v'] }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    
    @foreach($result['markets'] as $title => $odds)
      @if(!in_array($title, ['winX2', 'win12', 'win1X', 'win2', 'win1', 'winX', 'handicaps1', 'handicaps2', 'bothToScore']) && $odds)
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-{{ $title }}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $title }}" aria-expanded="true" aria-controls="panelsStayOpen-{{ $title }}">
              {{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $title))) }}
            </button>
          </h2>
          <div id="panelsStayOpen-{{ $title }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $title }}">
            <div class="accordion-body">
              <div class="row">
                @foreach($odds as $odd)
                <div class="col-6 d-flex justify-content-between p-2" style="background: #ddd; border: 1px solid #666;">
                  <span class="text-muted">Over({{ $odd['type'] }})</span>
                  <strong>{{ $odd['over']['v'] }}</strong>
                </div>
                <div class="col-6 d-flex justify-content-between p-2" style="background: #ddd; border: 1px solid #666;">
                  <span class="text-muted">Under({{ $odd['type'] }})</span>
                  <strong>{{ $odd['under']['v'] }}</strong>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
    
    
      
    </div>
  </div>
  
</div>




@endsection