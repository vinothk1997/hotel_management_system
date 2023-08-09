@extends('layouts.master')
@section('content')
    <div>
        <h3>Gender Based Customers</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender Type</option>
                        <option value="all">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Address</th>
            <th>Date of Birth</th>
        </tr>
    </table>
    <span class="tr"></span>
    <script>
        $('#gender').on('change', function() {
            generateGenderBasedReport();
            
        });

        function generateGenderBasedReport() {
            $.ajax({
                url: "{{route('report.generateGenderBasedReport')}}",
                method: 'GET',
                data: {
                    gender: $('#gender').val(),
                
                },
                success: function(response) {
                    $('.table').remove();
                    $('.tr').append(response);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
