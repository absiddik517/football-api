@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Football</a></li>
    <li class="breadcrumb-item active" aria-current="page">Live League</li>
  </ol>
</nav>

    <div class="list-group">
      @foreach($results as $league)
      <a href="{{ route('league.live', [$league['league_id'], $league['title']]) }}" class="list-group-item list-group-item-action">
        {{ $league['title'] }} 
      </a>
      @endforeach
    </div>

@endsection