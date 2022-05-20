
    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </div>
        </nav>
    </div>

    <section class="pro-content">

        <div class="container">
            <div class="page-heading-title">
                <h2> CONTACT US
                </h2>

            </div>
        </div>
        <!-- contact Content -->
        <section class="contact-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-start">
                                    <form id="contactusForm">
                                        <label class="first-label" for="email">First Name</label>
                                        <div class="input-group">


                                            <input type="text" class="form-control" id="first_name"
                                                placeholder="Enter Your First Name" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a first name.
                                            </div>
                                        </div>
                                        <label class="first-label" for="email">Last Name</label>
                                        <div class="input-group">


                                            <input type="text" class="form-control" id="last_name"
                                                placeholder="Enter Your Last Name" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a last name.
                                            </div>
                                        </div>
                                        <label for="email">Email</label>
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="email"
                                                placeholder="Enter Email here.." aria-describedby="inputGroupPrepend"
                                                required>
                                            <div class="invalid-feedback">
                                                Please choose a email.
                                            </div>
                                        </div>
                                        <label for="email">Phone</label>
                                        <div class="input-group">


                                            <input type="text" class="form-control textbox" id="phone"
                                                placeholder="Enter Your Phone" aria-describedby="inputGroupPrepend"
                                                required>
                                            <div class="invalid-feedback">
                                                Please choose a phone.
                                            </div>
                                        </div>
                                        <label for="email">Message</label>
                                        <textarea name="message" id="message" placeholder="write..." rows="5" cols="56"></textarea>


                                        <button type="submit" class="btn btn-secondary swipe-to-top">SUBMIT <i
                                                class="fas fa-location-arrow"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5">
                                <div id="map" style="height:400px; margin-top: 5px;">

                                </div>
                                <script>
                                    var map;

                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: {
                                                lat: -34.397,
                                                lng: 150.644
                                            },
                                            zoom: 8
                                        });
                                    }
                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
                                <p class="info">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum.
                                </p>
                            </div>
                            <div class="col-12 col-lg-3">

                                <div class="">
                                    <ul class="contact-info pl-0 mb-0">
                                        <li> <i class="fas fa-mobile-alt"></i><span><a href="javascript:void(0)">888-9636-6000</a><br> <a
                                                    href="javascript:void(0)">888-9636-6000</a></span> </li>
                                        <li> <i class="fas fa-map-marker"></i><span><a href="javascript:void(0)">Ecommerce<br>Demo Store
                                                    3654123</a></span> </li>
                                        <li> <i class="fas fa-envelope"></i><span> <a
                                                    href="javascript:void(0)">Support@ecommerce.com</a><br><a href="javascript:void(0)">info@ecommerce.com</a>
                                            </span> </li>
                                        <li> <i class="fas fa-tty"></i><span> <a href="javascript:void(0)">23456789</a><br><a
                                                    href="javascript:void(0)">123456</a> </span> </li>

                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </section>

