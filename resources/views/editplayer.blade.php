@extends('layout.template')

@section('content')
    <form action="{{ route('player.update', $playerEdit) }}" method="POST">
        @method('put')
        @csrf

        <div class="mb-3">

            <label for="player_name" class="form-label">Name</label>

            <input type="text" class="form-control" id="player_name" name="player_name" placeholder="Full Name"
                value="{{ $playerEdit->player_name }}" required>

        </div>

        <div class="mb-3">

            <label for="email" class="form-label">Email address</label>

            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ $playerEdit->email }}" required>

            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>

        <div class="mb-3">

            <label for="phone" class="form-label">Phone Number</label>

            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number"
                value="{{ $playerEdit->phone }}" required>

        </div>

        <div class="mb-3">

            <label for="player_note" class="form-label">Note</label>

            <textarea class="form-control" id="player_note" name="player_note" placeholder="Note" cols="30" rows="10"
                required>{{ $playerEdit->player_note }}</textarea>

        </div>

        <div class="mb-3">

            <label for="team" class="form-label">Select Team</label>

            <select name="team" id="team" class="form-select" required>

                @foreach ($teams as $team)
                    @if (old('team_id', $playerEdit->team_id) === $team->id)
                        <option value="{{ $team->id }}" selected>{{ $team->team_name }}</option>
                    @else
                        <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                    @endif
                @endforeach

            </select>

        </div>

        <button name="inputSubmitPlayer" type="submit" class="btn btn-primary">Register</button>

    </form>
@endsection
