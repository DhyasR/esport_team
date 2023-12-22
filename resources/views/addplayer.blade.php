@extends('layout.template')

@section('content')
    <form action="{{ route('player.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">

            <label for="player_name" class="form-label">Name</label>

            <input type="text" class="form-control" id="player_name" name="player_name" placeholder="Full Name" required>

        </div>

        <div class="mb-3">

            <label for="email" class="form-label">Email address</label>

            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>

            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>

        <div class="mb-3">

            <label for="phone" class="form-label">Phone Number</label>

            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>

        </div>

        <div class="mb-3">

            <label for="player_note" class="form-label">Note</label>

            <textarea class="form-control" id="player_note" name="player_note" placeholder="Note" cols="30" rows="10"
                required></textarea>

        </div>

        <div class="mb-3">

            <label for="player_image" class="form-label">Upload Player Image</label>

            <img class="img-preview imgfluid mb3 col-sm-5">

            <input type="file" class="form-control" name="player_image" id="player_image"
                accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">

        </div>

        <div class="mb-3">

            <label for="team" class="form-label">Select Team</label>

            <select name="team" id="team" class="form-select" required>

                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach

            </select>

        </div>

        <button name="inputSubmitPlayer" type="submit" class="btn btn-primary">Register</button>

    </form>

    <script>
        function priviewImage() {
            const image = document.querySelector('#player_image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ogReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
