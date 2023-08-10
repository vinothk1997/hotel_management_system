@extends('layouts.master')
@section('content')
    <div>
        <h3>Booking Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" disabled />
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
    <script>
        var $bookings;

        $('#start_date').on('input', function() {
            if ($('#start_date').length > 0) {
                $('#end_date').prop('disabled', false);
                generateBookingDateReport();

            }
        });

        $('#end_date').on('input', function() {
            generateBookingDateReport();
        });

        function generateBookingDateReport() {
            $.ajax({
                url: "{{route('report.generateBookingDateReport')}}",
                method: 'GET',
                data: {
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
