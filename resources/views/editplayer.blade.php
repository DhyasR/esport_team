@extends('layout.template')

@section('content')
    <form action="{{ route('player.update', $playerEdit) }}" method="POST" enctype="multipart/form-data">
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
            <label for="player_image" class="form-label">Update Player Image</label>
            @if ($playerEdit->player_image)
                <img src="{{ asset('storage/' . $playerEdit->player_image) }}" alt="{{ $playerEdit->player_name }}"
                    class="img-preview img-fluid mb-3 col-sm-5">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5" style="display: none;">
            @endif
            <input type="file" class="form-control" name="player_image" id="player_image"
                accept="image/jpg, image/png, image/jpeg" onchange="previewImage()">
            <input type="hidden" id="oldImage" name="oldImage" value="{{ $playerEdit->player_image }}">
        </div>

        <div class="mb-3">
            <label for="team" class="form-label">Select Team</label>
            <select name="team" id="team" class="form-select" required>
                @foreach ($teams as $team)
                    @if (old('team_id', $playerEdit->team_id) == $team->id)
                        <option value="{{ $team->id }}" selected>{{ $team->team_name }}</option>
                    @else
                        <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button name="inputSubmitPlayer" type="submit" class="btn btn-primary">Register</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ketika halaman dimuat, tampilkan gambar lama (jika ada)
            const oldImageInput = document.querySelector('#oldImage');
            const oldImageValue = oldImageInput.value;
            const imgPreview = document.querySelector('.img-preview');

            if (oldImageValue) {
                imgPreview.style.display = 'block';
                imgPreview.src = '{{ asset('storage/') }}/' + oldImageValue;
            }
        });

        function previewImage() {
            const image = document.querySelector('#player_image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
