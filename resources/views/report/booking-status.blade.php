@extends('layouts.master')
@section('content')
    <div>
        <h3>Status Based Bookings</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="all">All</option>
                        <option value="cancelled">Cancelled Bookings</option>
                        <option value="booked">Active Bookings</option>
                        <option value="checkOut">Check Out Bookings</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control"  />
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>No of Childrens</th>
            <th>No of Adults</th>
            <th>Phone No</th>
            <th>Room No</th>
        </tr>
    </table>
    <span class="tr"></span>
    <script>
        $('#status').on('change', function() {
            generateBookingStatusReport();

        });
        $('#start_date').on('change', function() {
            generateBookingStatusReport();

        });
        $('#end_date').on('change', function() {
            generateBookingStatusReport();

        });

        function generateBookingStatusReport() {
            $.ajax({
                url: "{{ route('report.generateBookingStatusReport') }}",
                method: 'GET',
                data: {
                    status: $('#status').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val(),

                },
                success: function(response) {
                    $('.data').remove();
                    $bookings = '';
                    console.log(response);
                    response.forEach(function(obj) {
                        $bookings = $bookings + '<tr class="data"> <td>' + obj.customer.lname +obj.customer.fname+
                            '</td><td>' + obj.no_of_childrens + '</td><td>' + obj.no_of_adults + '</td><td>' + obj.customer.phone_no + '</td><td>' + obj.room_no + '</td></tr>'
                    });
                    $('table').append($bookings);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
