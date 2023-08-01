@extends('layouts.master')
@section('title', 'create-price')
@section('content')
    <div class="container mt-3">
        <a href="{{ route('price.index') }}" class="btn btn-sm btn-secondary my-2">Back</a>
        <div>
            <p class="h3">Create Price for Room </p>
        </div>
        <Form action="{{ route('price.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Room Type</label>
                        <select name="room_type" id="room_type" class="form-control">
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}">{{ $roomType->type }}</option>
                                <option>hello</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="room-select" class="col-6">
                    <label>Rooms</label>
                    <select class='form-control' name='room'></select>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Price Per Day</label>
                        <input type="text" name="price_per_day" class="form-control" />
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
    <script>
        var $room_type = $('#room_type');

        $('#room_type').on('click', function() {
            getRooms();
        });


        function getRooms() {
            $.ajax({
                url: "{{ route('price.getRooms') }}",
                method: 'GET',
                data: {
                    room_type: $('#room_type').val(),
                },
                success: function(response) {
                    console.log(response);
                    $('#room-select option').remove();
                    $('#room-select select').append(response);

                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
