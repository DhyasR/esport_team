@extends('layout.template')

@section('content')
    <h3 class="mt-10">Name : {{ $player['player_name'] }}</h3>
    <p>Email : {{ $player['email'] }}</p>
    <p>Note : {{ $player['player_note'] }}</p>
    <p>Team Name : {{ $player->team->team_name }}</p>
@endsection
