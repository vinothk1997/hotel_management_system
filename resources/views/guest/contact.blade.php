@extends('layouts.guest')
@section('title','contact')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/global-header.css" />
    <link rel="stylesheet" href="./assets/css/global-footer.css" />
    <link rel="stylesheet" href="./assets/css/accesibility.css">
    <link rel="stylesheet" href="./assets/css/contact-page.css" />
    <link rel="shortcut icon" href="./assets/img/favicon.webp" type="image/x-icon" />
@endsection
@section('content')
    <main>
        <div class="container">
            <!-- Header part contain Title page and descriptoion -->
            <div class="header">
                <h2>Contact Us</h2>
                <hr />
                <p>
                    Intersted in striking a partnership or do you have any complaint or
                    feedback? Fill the form below
                </p>
            </div>

            <!-- End of header Part -->

            <!-- Main part contain form and informatoion contactus -->
            <div class="main">
                <div class="contact">
                    <!-- Form start here -->
                    <div class="contact-form">
                        <form action="#">
                            <div class="contact-detail">
                                <label class="hide" for="name">Enter your name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" />
                                <label class="hide" for="email">Enter your email address</label>
                                <input type="email" class="form-control" placeholder="Email" id="email"
                                    name="email" />
                            </div>
                            <label class="hide" for="message">message</label>
                            <textarea class="form-control" rows="5" id="comment" placeholder="Message" style="resize: none; width: 100%;"
                                name="message"></textarea>

                            <button type="submit" class="btn">SEND MESSAGE</button>
                        </form>
                    </div>
                    <!-- Form finish here -->

                    <!-- Contact Us start here -->
                    <div class="contact-us">
                        <h3>Contact Us</h3>

                        <span><i style="font-size: 1.5rem;" class="fa fa-map-marker" aria-hidden="true"></i>160th Mile Post, 
                           5th Canel Lane,A9 Road Paranthan ,Kilinochchi</span>
                        <span><i style="font-size: 1.5rem;" class="fa fa-phone" aria-hidden="true"></i>077 720 2408</span>
                        <span><i style="font-size: 1.5rem;" class="fa fa-envelope-o"
                                aria-hidden="true"></i>Support@Rjmahaal.com</span>
                    </div>
                    <!-- Contact Us Finish here -->
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="assets/js/toggleHamburger.js"></script>
@endsection
