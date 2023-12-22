@extends('layout.template')

@section('content')
    <form action="{{ route('team.update', $teamEdit) }}" method="POST">
        @method('put')
        @csrf

        <div class="mb-3">

            <label for="team_name" class="form-label">Team Name</label>
            <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name" value="{{ $teamEdit->team_name }}" required>

        </div>

        <div class="mb-3">

            <label for="team_note" class="form-label">Note</label>
            <textarea class="form-control" id="team_note" name="team_note" placeholder="Team Note" cols="30" rows="10" required>{{ $teamEdit->team_note }}</textarea>

        </div>

        <div class="mb-3">

            <label for="game" class="form-label">Game Played</label>
            <input type="text" class="form-control" id="game" name="game" placeholder="Game Played" value="{{ $teamEdit->game }}" required>

        </div>

        <button name="inputSubmitTeam" type="submit" class="btn btn-primary">Register</button>

    </form>
@endsection
