@extends('layout.template')

@section('content')
    <form action="/" action="GET" class="form-inline w-25 d-flex gap-2">
        <input class="form-control" type="search" name="search" placeholder="search">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>

    <table class="table mt-2">

        <thead>

            <tr>

                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Note</th>

                @auth
                    <th scope="col">Action</th>
                @endauth

            </tr>

        </thead>

        <tbody>

            @foreach ($players as $player)
                <tr>

                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="/player/{{ $player['id'] }}">{{ $player['player_name'] }}</a></td>
                    <td>{{ $player['email'] }}</td>
                    <td>{{ $player['phone'] }}</td>
                    <td>{{ $player['player_note'] }}</td>

                    @auth
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
                    @endauth

                </tr>
            @endforeach

        </tbody>

    </table>

    <div>
        {{ $players->links() }}
    </div>
@endsection
