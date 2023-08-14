@extends('layouts.master')
@section('title', 'create-booking')
@section('content')
    <div class="container mt-3">
        <div>
            <p class="h3">Create a Booking for Room, </p>
            <form class="d-inline me-1" action="{{ route('customer.show') }}" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" name="id" value="{{ $customer_id }}" />
                <button type="submit" class="btn btn-sm btn-secondary">Back</a>
            </form>
        </div>
        <Form action="{{ route('booking.payment') }}" method="GET">
            {{-- @csrf --}}
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label> Room Type:</label>
                        <select class="form-control" name="room_type" id="room_type">
                            <option>Select room Type</option>
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}">{{ $roomType->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table" id='room'>
                    <tr>
                        <th></th>
                        <th>Room No</th>
                        <th>No of Beds</th>
                        <th>No of Bathrooms</th>
                        <th>No of Chairs</th>
                        <th>No of Tables</th>
                    </tr>

                </table>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Arival:</label>
                        <input type="date" name="arival_date" id="arival_date" onkeypress="return isTextKey(event)"
                            class="form-control @error('arival_date') is-invalid @enderror"
                            value="{{ old('arival_date') }}">
                        @error('arival_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Departure:</label>
                        <input type="date" name="departure_date" id="departure_date"
                            class="form-control @error('departure_date') is-invalid @enderror"
                            value="{{ old('departure_date') }}">
                        @error('departure_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Time of Arival:</label>
                        <input type="time" name="arival_time" id="arival_time"
                            class="form-control @error('arival_time') is-invalid @enderror"
                            value="{{ old('arival_time') }}">
                        @error('arival_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Time of Departure:</label>
                        <input type="time" name="departure_time" id="departure_time"
                            class="form-control @error('departure_time') is-invalid @enderror"
                            value="{{ old('departure_time') }}">
                        @error('departure_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>No of Adults:</label>
                        <input type="text" name="no_of_adults" id="no_of_adults"
                            class="form-control @error('no_of_adults') is-invalid @enderror"
                            value="{{ old('no_of_adults') }}">
                        @error('no_of_adults')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>No of Childrens:</label>
                        <input type="text" name="no_of_children" id="no_of_children"
                            class="form-control @error('no_of_children') is-invalid @enderror"
                            value="{{ old('no_of_children') }}">
                        @error('no_of_children')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Reserve</button>
        </Form>
    </div>
    <script>
        $('#arival_date').on('change', function() {
            checkDate();
        });
        $('#departure_date').on('change', function() {
            checkDate();
        });


        function checkDate() {
            var arrivalDate = new Date($('#arival_date').val());
            var departureDate = new Date($('#departure_date').val());

            if (arrivalDate > departureDate) {
                alert('Arrival Date should be less than departure date');
            }
        }

        var $room_type = $('#room_type');

        $('#room_type').on('change', function() {
            getRooms();
        });


        function getRooms() {
            $.ajax({
                url: "{{ route('room.getRooms') }}",
                method: 'GET',
                data: {
                    room_type: $('#room_type').val(),
                },
                success: function(response) {
                    console.log(response);
                    $('.room-row').remove();
                    $('#room').append(response);

                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
