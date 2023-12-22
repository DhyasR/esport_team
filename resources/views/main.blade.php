@extends('layout.template')

@section('content')
    <form action="/" action="GET" class="form-inline w-25 d-flex gap-2">
        <input class="form-control" type="search" name="search" placeholder="search">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>

    <table class="table mb-5 mt-2">

        <thead>

            <tr>

                <th scope="col">No</th>
                <th scope="col">Team Name</th>
                <th scope="col">Note</th>
                <th scope="col">Game Played</th>

                @auth
                    <th scope="col">Action</th>
                @endauth

            </tr>

        </thead>

        <tbody>

            @foreach ($teams as $team)
                <tr>

                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="/team/{{ $team['id'] }}">{{ $team['team_name'] }}</td>
                    <td>{{ $team['team_note'] }}</td>
                    <td>{{ $team['game'] }}</td>

                    @auth
                        <td>

                            <a href="{{ route('team.edit', $team) }}">

                                <button class="btn btn-warning">Update</button>

                            </a>

                            <form action="{{ route('team.destroy', $team) }}" method="POST">
                                @method('delete')
                                @csrf

                                <button class="btn btn-danger">Delete</button>

                            </form>

                        </td>
                    @endauth

                </tr>
            @endforeach

        </tbody>

    </table>

    <div>
        {{ $teams->links() }}
    </div>
@endsection
