@extends('layout.template')

@section('content')
    <h3 class="mt-10">Name : {{ $team['team_name'] }}</h3>
    <p>Note : {{ $team['team_note'] }}</p>
    <p>Game : {{ $team['game'] }}</p>

    <table class="table mt-2">

        <thead>

            <tr>

                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Note</th>
                <th scope="col">Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($team->players as $player)
                <tr>

                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="/player/{{ $player['id'] }}">{{ $player['player_name'] }}</a></td>
                    <td>{{ $player['email'] }}</td>
                    <td>{{ $player['phone'] }}</td>
                    <td>{{ $player['player_note'] }}</td>
                    <td>

                        <a href="{{ route('player.edit', $player) }}">

                            <button class="btn btn-warning">Update</button>

                        </a>

                        <form action="{{ route('player.destroy', $player) }}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger">Delete</button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
