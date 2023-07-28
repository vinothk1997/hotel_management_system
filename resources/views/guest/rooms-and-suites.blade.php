@extends('layouts.guest')
@section('title','Rooms and Suites')
@section('css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/global-header.css">
    <link rel="stylesheet" href="./assets/css/global-footer.css">
    <link rel="stylesheet" href="./assets/css/rooms-and-suites.css">
    <link rel="shortcut icon" href="./assets/img/favicon.webp" type="image/x-icon">
@endsection
@section('content')
    <main>
        <div class="container">

            <!-- Top Text -->
            <div class="page-header-container">
                <h2 class="page-header">Star Hotel Rooms</h2>
                <hr />
                <p class="page-sub-header">
                    Get the most of our hotel specials. Enjoy the modern <br>
                    comfort and panoramic view
                </p>
            </div>

            <!-- Special offers section -->
            <section class="special-offers">
                <div class="row center-lg">
                    <div class="col image-col right-marg">
                        <img src="assets/img/hotel-1.webp" alt="room-image" class="small-image">
                        <img src="assets/img/hotel-2.webp" alt="room-image" class="small-image">
                        <img src="assets/img/hotel-3.webp" alt="room-image" class="small-image">
                        <div class="side-by-side-container">
                            <div class="large-image-container">
                                <img src="assets/img/hotel-4-large.webp" alt="room-image-large" class="large-image">
                            </div>
                            <section class="stacked-image-container">
                                <div><img src="assets/img/hotel-5.webp" alt="room-image" class="small-image"></div>
                                <div><img src="assets/img/hotel-6.webp" alt="room-image" class="small-image"></div>
                            </section>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="offers-title">Special Offers</h3>
                        <p class="offers-sub-title">
                            Get 10% discount off this city view- standard room. <br> Offers valid till june 31st 2020
                        </p>
                        <ul class="offers-list">
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Free Wi-Fi Service</p>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Best Rate Guarantee</p>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                    <p class="list-text">Free DSTV Access</p>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-fill btn-large">View More</a>
                    </div>
                </div>
            </section>

            <!-- Rooms -->
            <section class="rooms-section">
                <div class="row room-section-header-container">
                    <div class="col col-3">
                        <h4 class="room-section-header active-header" id="standard-room">Standard Rooms</h4>
                    </div>
                    <div class="col col-3">
                        <h4 class="room-section-header" id="executive-room">Executive Rooms</h4>
                    </div>
                    <div class="col col-3">
                        <h4 class="room-section-header" id="king-room">King Suites</h4>
                    </div>
                </div>
                <div class="row center-lg">
                    <div class="rooms col col-2">
                        <img src="https://res.cloudinary.com/start-ng/image/upload/v1591638448/Rectangle_42_nastdj.png"
                            alt="" class="rooms-img">
                        <h3 class="room-title">Standard Economic Single</h3>
                        <p class="room-text">Designed specifically for Practicality and <br> comfort</p>
                        <div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">2 Persons</p>
                            </div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">1 Kingsize bed</p>
                            </div>
                        </div>
                        <p class="amount-text">NGN25,000 Per Night</p>
                        <div class="buttons-container">
                            <a href="#" class="btn btn-ghost">View More</a>
                            <a href="https://timbu.com/search?query=hotel" class="btn btn-fill">Book Now</a>
                        </div>
                    </div>
                    <div class="rooms col col-2">
                        <img src="https://res.cloudinary.com/start-ng/image/upload/v1591638449/Rectangle_43_d9eepu.png"
                            alt="" class="rooms-img">
                        <h3 class="room-title">Standard Economic Single</h3>
                        <p class="room-text">Designed specifically for Practicality and <br> comfort</p>
                        <div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">2 Persons</p>
                            </div>
                            <div class="details-container">
                                <img src="assets/img/bed.png" alt="tick" class="list-icon">
                                <p class="list-text">1 Kingsize bed</p>
                            </div>
                        </div>
                        <p class="amount-text">NGN35,000 Per Night</p>
                        <div class="buttons-container">
                            <a href="#" class="btn btn-ghost">View More</a>
                            <a href="https://timbu.com/search?query=hotel" class="btn btn-fill">Book Now</a>
                        </div>
                    </div>
                    <div class="rooms col col-2">
                        <img src="https://res.cloudinary.com/start-ng/image/upload/v1591638448/Rectangle_44_anerdv.png"
                            alt="" class="rooms-img">
                        <h3 class="room-title">Standard Economic Single</h3>
                        <p class="room-text">Designed specifically for Practicality and <br> comfort</p>
                        <div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">2 Persons</p>
                            </div>
                            <div class="details-container">
                                <img src="assets/img/bed.png" alt="tick" class="list-icon">
                                <p class="list-text">1 Kingsize bed</p>
                            </div>
                        </div>
                        <p class="amount-text">NGN45,000 Per Night</p>
                        <div class="buttons-container">
                            <a href="#" class="btn btn-ghost">View More</a>
                            <a href="https://timbu.com/search?query=hotel" class="btn btn-fill">Book Now</a>
                        </div>
                    </div>
                    <div class="rooms col col-2">
                        <img src="https://res.cloudinary.com/start-ng/image/upload/v1591638449/Rectangle_45_mtl458.png"
                            alt="" class="rooms-img">
                        <h3 class="room-title">Standard Economic Single</h3>
                        <p class="room-text">Designed specifically for Practicality and <br> comfort</p>
                        <div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">2 Persons</p>
                            </div>
                            <div class="details-container">
                                <img src="assets/img/bed.png" alt="tick" class="list-icon">
                                <p class="list-text">1 Kingsize bed</p>
                            </div>
                        </div>
                        <p class="amount-text">NGN50,000 Per Night</p>
                        <div class="buttons-container">
                            <a href="#" class="btn btn-ghost">View More</a>
                            <a href="https://timbu.com/search?query=hotel" class="btn btn-fill">Book Now</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
@section('js')
    <script src="assets/js/switchRooms.js"></script>
    <script src="assets/js/toggleHamburger.js"></script>
@endsection
