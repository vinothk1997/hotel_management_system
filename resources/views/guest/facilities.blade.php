@extends('layouts.guest')
@section('title', 'facilities')
@section('css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/global-header.css">
    <link rel="stylesheet" href="./assets/css/global-footer.css">
    <link rel="stylesheet" href="./assets/css/facilities.css">
    <link rel="shortcut icon" href="./assets/img/favicon.webp" type="image/x-icon">
@endsection

@section('content')
    <main>
        <div class="container">

            <!-- Top Text -->
            <div class="page-header-container">
                <h2 class="page-header">Star Hotel Facilities</h2>
                <hr />
                <p class="page-sub-header">
                    Get the most of our hotel facilities. Enjoy the state of <br> the art facilities in our hotel
                </p>
            </div>
            <!-- Upper Section -->
            <section class="upper-section">
                <div class="row center-lg">
                    <div class="col image-col right-marg">
                        <div class="large-image-container">
                            <img src="./assets/img/telephone.webp" alt="room-image-large" class="large-image">
                        </div>

                    </div>
                    <!-- Top Right Text -->
                    <div class="col">
                        <h3 class="right-title">Access to 24hr Digital <br> Telephone Services</h3>
                        <p>
                            With our feature rich Digital telephone services, you <br> will have the flexibility you
                            have always wanted with <br> voice communication from your home or business.
                        </p>
                        <br>
                        <h3>More Details</h3>
                        <ul class="facilities-list">
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Unlimited Long Distance</p>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Caller ID</p>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Caller Waiting</p>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-fill btn-large">View More</a>
                    </div>
                </div>
            </section>
            <!-- Other Facilities Section -->
            <div class="up">
                <h2 class="page-header">Other Facilities</h2>
                <hr />
            </div>

            <!-- Facilities Gallery -->
            <div class="container">
                <div class="containera">

                    <div class="gallery">

                        <div class="gallery-item">
                            <img class="gallery-image" src="./assets/img/gymnasium.webp" alt="gym">
                            <h4>
                                GYMNASIUM
                            </h4>
                            <p class="imggrid">
                                We have the most equipped gymnasium in the country with an instructor
                                always available.
                            </p>
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="./assets/img/helipad.webp" alt="helipad">
                            <h4>HELIPAD</h4>
                            <p class="imggrid">
                                Access to the state of the art helipad coupled with pilots with over
                                ten years experience.
                            </p>
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="./assets/img/restaurants.webp" alt="restaurants">
                            <h4>RESTAURANTS</h4>
                            <p class="imggrid">
                                We have the best local and intercontinental dishes you have ever
                                tasted before in our hotel.
                            </p>
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="./assets/img/swimming_pool.webp" alt="swim">
                            <h4>SWIMMING POOLS</h4>
                            <p class="imggrid">
                                We have the best equipped swimming pool in the country with an
                                instructor waiting to guide you
                            </p>
                        </div>

                    </div>

                </div>
            </div>

    </main>
@endsection


</body>

</html>
