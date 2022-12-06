@extends('layouts.app')

@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Football</a></li>
    <li class="breadcrumb-item active" aria-current="page">Upcomming League</li>
  </ol>
</nav>

    <div class="list-group">
      @forelse($results ?? [] as $league)
      <a href="{{ route('league.line', [$league['league_id'], $league['title']]) }}" class="list-group-item list-group-item-action">
        {{ $league['title'] }} 
      </a>
      @empty
      <a href="javascript:void(0)" class="list-group-item list-group-item-action disabled">
        League not found.
      </a>
      @endforelse
    </div>

@endsection