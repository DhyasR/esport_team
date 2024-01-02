@extends('layout.template')

@section('content')
    <h3 class="mt-10">Name : {{ $player['player_name'] }}</h3>
    <img src="{{ asset('storage/' . $player->player_image) }}" alt="{{ $player->player_name }}" class="img-fluid">
    <p>Email : {{ $player['email'] }}</p>
    <p>Note : {{ $player['player_note'] }}</p>
    <p>Team Name : {{ $player->team->team_name }}</p>
@endsection
