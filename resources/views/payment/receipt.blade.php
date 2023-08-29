<div class="container">
    <style>
        p{
            line-height: 0.5;
        }
        
    </style>
    <h2>
        <center>Rj Mahal-booking confirmation</center>
    </h2>
    <div>
        <p><b>Mobile:-076940855</b></p>
        <p><b>Email:- vinothk1997@gmail.com</b></p>
        <p><b>Address:- Paranthan Kilinochchi</b></p>
    </div>
    <hr>
    <table>
        <tr>
            <td>Customer Name:</td>
            <td>{{ $user['name'] }}</td>
            <td>Mobile No</td>
            <td>{{ $user['real_name']->phone_no }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $user['real_name']->email }}</td>
            <td>No of Rooms Booked:</td>
            <td>{{$bookingData['no_of_rooms']}}</td>
        </tr>
        <tr>
            <td>Total Amount Payable:</td>
            <td>Rs.{{$bookingData['total']}}</td>
            <td>Payment Reference No</td>
            <td>dedewfd</td>
        </tr>
        <tr>
            <td>No of Children:</td>
            <td>{{$bookingData['no_of_adults']}}</td>
            <td>No of Adults:</td>
            <td>{{$bookingData['no_of_childrens']}}</td>
        </tr>
        <tr>
            <td>Arival Date</td>
            <td>{{$bookingData['check_in_date']}}</td>
            <td>Departure Date</td>
            <td>{{$bookingData['check_out_date']}}</td>
        </tr>
        <tr>
            <td>Room No</td>
            <td>{{$bookingData['room_no']}}</td>
        </tr>
    </table>
    <p>To pay via the bank use below information </p>
    <p>Name: RJ Mahaal hotel</p>
    <p>Bank: Bank of Ceylon</p>
    <p>Branch: Paranthan</p>
    <p>
        <center>Thank you for booking with us</center>
    </p>
</div>
