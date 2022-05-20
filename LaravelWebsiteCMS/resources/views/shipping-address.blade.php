@extends('layouts.master')
@section('content')


<!--Shipping Content -->

<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.shipping-address') }}</li>
            </ol>
        </div>
    </nav>
</div>
<section class="pro-content">

    <section class="shipping-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">

                    <div class="heading">
                        <h2>
                            {{ trans('lables.shipping-address-my-account') }}
                        </h2>
                        <hr>
                    </div>
                    @include('includes.side-menu')
                </div>
                <div class="col-12 col-lg-9 ">
                    <div class="heading">
                        <h2>
                            {{ trans('lables.shipping-address') }}
                        </h2>
                        <hr>
                    </div>

                    <table class="table shipping-table">
                        <thead>
                            <tr>
                                <th scope="col">{{ trans('lables.shipping-address-default') }}</th>
                                <th scope="col">{{ trans('lables.shipping-address-first-name') }}</th>
                                <th scope="col">{{ trans('lables.shipping-address-last-name') }}</th>
                                <th scope="col">{{ trans('lables.shipping-address-country-state-city') }}</th>
                                <th scope="col" class="d-none d-md-block">{{ trans('lables.shipping-address-action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="shipping-address-listing-show">

                        </tbody>
                    </table>

                    <template id="shipping-address-listing-template">
                        <tr class="shipping-address-listing-id">
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input shipping-address-listing-is-default" name="radiobtn" type="radio">
                                </div>
                            </td>
                            <td>
                                <label class="form-check-label shipping-address-listing-first-name">
                                </label>
                            </td>
                            <td>
                                <label class="form-check-label shipping-address-listing-last-name">
                                </label>
                            </td>
                            <td>
                                <label class="form-check-label shipping-address-listing-country-state-city">
                                </label>
                            </td>

                            <td class="edit-tag">
                                <ul>
                                    <li><a href="javascript:void(0)" class="shipping-address-listing-edit-btn"> <i class="fas fa-pen"></i> Edit</a></li>
                                    <li><a href="javascript:void(0)" class="shipping-address-listing-delete-btn"> <i class="fas fa-trash-alt"></i> Remove</a></li>
                                </ul>

                            </td>
                        </tr>
                    </template>
                    <div class="heading mt-4">
                        <h2>
                            {{ trans('lables.shipping-address-add') }}
                        </h2>
                        <hr>
                    </div>

                    <div class="main-form">
                        <form id="shippingAddressForm">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">{{ trans('lables.shipping-address-first-name') }}</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="{{ trans('lables.shipping-address-first-name') }}">
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ trans('lables.shipping-address-last-name') }}</label>
                                    <input type="text" class="form-control" id="last_name" placeholder="{{ trans('lables.shipping-address-last-name') }}">
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for=""> {{ trans('lables.shipping-address-stret-address') }}</label>
                                    <input type="text" class="form-control" id="street_address" placeholder="{{ trans('lables.shipping-address-stret-address') }}">
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                                <div class="form-group select-control col-md-6">
                                    <label for=""> {{ trans('lables.shipping-address-country') }}</label>
                                    <select class="form-control " id="country_id" onchange="states()">
                                    </select>
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group select-control col-md-6">
                                    <label for="">{{ trans('lables.shipping-address-state') }}</label>
                                    <select class="form-control " id="state_id">
                                    </select>
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                                <div class="form-group select-control col-md-6">
                                    <label for=""> {{ trans('lables.shipping-address-city') }}</label>
                                    <input type="text" class="form-control " id="city" placeholder="{{ trans('lables.shipping-address-city') }}"/>
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for=""> {{ trans('lables.shipping-address-postal-code') }}</label>
                                    <input type="text" class="form-control" id="postcode" placeholder="{{ trans('lables.shipping-address-postal-code') }}">
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                                @if(isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1')
                                <div class="form-group col-md-6">
                                    <label for=""> {{ trans('lables.shipping-address-latlong') }}</label>
                                    <input type="text" class="form-control" data-toggle="modal" data-target="#mapModal" name="location"
                                    id="location" aria-describedby="addressHelp" placeholder="{{ trans('lables.shipping-address-latlong') }}">
                                    <div class="invalid-feedback">
                                        
                                    </div>
                                </div>
                                @endif
                            </div>

                            <input type="hidden" class="form-control" id="method">
                            <input type="hidden" class="form-control" id="country_id_hidden">
                            <input type="hidden" class="form-control" id="state_id_hidden">
                            <input type="hidden" class="form-control" id="addres_id">
                            <input type="hidden" class="form-control" id="gender">
                            <input type="hidden" class="form-control" id="dob">
                            <input type="hidden" class="form-control" id="phone">
                            <button type="submit" class="btn btn-secondary swipe-to-top">{{ trans('lables.shipping-address-add-address') }}</button>
                        </form>
                    </div>
                    <!-- ............the end..... -->
                </div>
            </div>
        </div>
    </section>
</section>
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-modal="true">

    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="form-group">
                            <input type="text" id="pac-input" name="address_address" class="form-control map-input">
                        </div>
                        <div id="address-map-container" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="map"></div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="setUserLocation()"><i
                        class="fas fa-location-arrow"></i></button>
                <button type="button" class="btn btn-secondary" onclick="saveAddress()">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{url('/')}}";
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    $(document).ready(function() {
        getCustomerAdress();
        countries();
    });

    function getCustomerAdress() {
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/client/customer_address_book',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#shipping-address-listing-show").html('');
                    const templ = document.getElementById("shipping-address-listing-template");
                    for(i=0;i<data.data.length;i++){
                        const clone = templ.content.cloneNode(true);
                        clone.querySelector(".shipping-address-listing-first-name").innerHTML = data.data[i].first_name;
                        clone.querySelector(".shipping-address-listing-last-name").innerHTML = data.data[i].last_name;
                        country = state = '';
                        if(data.data[i].country_id != 'null' && data.data[i].country_id != null && data.data[i].country_id != ''){
                            country = data.data[i].country_id.country_name +', ';
                        }
                        if(data.data[i].state_id != 'null' && data.data[i].state_id != null && data.data[i].state_id != ''){
                            state = data.data[i].state_id.name +', ';
                        }
                        clone.querySelector(".shipping-address-listing-country-state-city").innerHTML = country + state + data.data[i].city;
                        clone.querySelector(".shipping-address-listing-is-default").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-is-default").setAttribute('onclick', 'isDefault(this)');
                        clone.querySelector(".shipping-address-listing-edit-btn").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-edit-btn").setAttribute('onclick', 'shippingEdit(this)');
                        clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('data-id', data.data[i].id);
                        clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('onclick', 'shippingDelete(this)');
                        if(data.data[i].default_address == '1'){
                            $("#shippingAddressForm").find("#gender").val(data.data[i].gender);
                            $("#shippingAddressForm").find("#dob").val(data.data[i].dob);
                            $("#shippingAddressForm").find("#phone").val(data.data[i].phone);
                            clone.querySelector(".shipping-address-listing-is-default").setAttribute('checked', true);
                        }
                        $("#shipping-address-listing-show").append(clone);
                    }
                    $("#shippingAddressForm").find("#method").val('post');
                }
            },
            error: function(data) {},
        });
    }

    $("#shippingAddressForm").submit(function(e) {
        e.preventDefault();
        first_name = $("#shippingAddressForm").find("#first_name").val();
        last_name = $("#shippingAddressForm").find("#last_name").val();
        street_address = $("#shippingAddressForm").find("#street_address").val();
        country_id = $("#shippingAddressForm").find("#country_id").val();
        state_id = $("#shippingAddressForm").find("#state_id").val();
        city = $("#shippingAddressForm").find("#city").val();
        postcode = $("#shippingAddressForm").find("#postcode").val();

        gender = $("#shippingAddressForm").find("#gender").val();
        dob = $("#shippingAddressForm").find("#dob").val();
        phone = $("#shippingAddressForm").find("#phone").val();
        method = $("#shippingAddressForm").find("#method").val();
        latlong = $("#shippingAddressForm").find("#location").val();
        if (method == 'post') {
            url = '/api/client/customer_address_book';
        } else {
            ids = $("#shippingAddressForm").find("#addres_id").val();
            url = '/api/client/customer_address_book/' + ids;
        }

        $.ajax({
            type: method,
            url: "{{ url('') }}" + url,
            data: {
                is_default: '1',
                gender: gender,
                dob: dob,
                phone: phone,
                postcode:postcode,
                city:city,
                state_id:state_id,
                country_id:country_id,
                street_address:street_address,
                last_name:last_name,
                first_name:first_name,
                type: 'profile',
                latlong:latlong,
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    toastr.success('{{ trans("response.shipping-add-successfully") }}')
                    getCustomerAdress();
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
                $("#shippingAddressForm").find("#first_name").val('');
                $("#shippingAddressForm").find("#last_name").val('');
                $("#shippingAddressForm").find("#street_address").val('');
                $("#shippingAddressForm").find("#country_id").val('');
                $("#shippingAddressForm").find("#state_id").val('');
                $("#shippingAddressForm").find("#city").val('');
                $("#shippingAddressForm").find("#postcode").val('');
                $("#shippingAddressForm").find("#gender").val('');
                $("#shippingAddressForm").find("#dob").val('');
                $("#shippingAddressForm").find("#phone").val('');
                $("#shippingAddressForm").find("#method").val('');
                $("#shippingAddressForm").find("#location").val('');
            },
            error: function(data) {
                console.log();
                if (data.status == 422) {
                    jQuery.each(data.responseJSON.errors, function(index, item) {
                        $("#" + index).parent().find('.invalid-feedback').css('display', 'block');
                        $("#" + index).parent().find('.invalid-feedback').html(item);
                    });
                } else {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
        });
    });

    function countries(){
        $.ajax({
            type: 'get',
            url: "{{ url('') }}/api/client/country?getAllData=1",
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    html = '<option value="">Select</option>';
                    for(i=0;i<data.data.length;i++){
                        selected = '';
                        if($.trim($("#country_id_hidden").val()) != '' && $.trim($("#country_id_hidden").val()) == data.data[i].country_id){
                            selected = 'selected';
                            $("#country_id_hidden").val('');
                        }
                        html += '<option value="'+data.data[i].country_id+'" '+selected+'>'+data.data[i].country_name+'</option>';
                    }
                    $("#country_id").html(html);
                    if($.trim($("#state_id_hidden").val()) != ''){
                        $("#country_id").trigger('change');
                    }

                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
            },
        });
    }

    function states(){
        country_id = $("#country_id").val();
        if(country_id == ''){
            $("#state_id").html('');
            return;
        }
        
        $.ajax({
            type: 'get',
            url: "{{ url('') }}/api/client/state?country_id="+country_id+'&getAllData=1',
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    html = '<option value="">Select</option>';
                    for(i=0;i<data.data.length;i++){
                        selected = '';
                        if($.trim($("#state_id_hidden").val()) != '' && $.trim($("#state_id_hidden").val()) == data.data[i].id){
                            selected = 'selected';
                        }
                        html += '<option value="'+data.data[i].id+'" '+selected+'>'+data.data[i].name+'</option>';
                    }
                    $("#state_id").html(html);
                    $("#state_id_hidden").val('');
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
            },
        });
    }

    function isDefault(input){
        id = $(input).attr('data-id');
        $.ajax({
            type: 'put',
            url: "{{ url('') }}/api/client/customer_address_book/" + id,
            data: {
                is_default: '1',
                is_default_type: 'default_action',
                type: 'profile'
            },
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    toastr.success('{{ trans("address-book-updated") }}')
                } else if (data.status == 'Error') {
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
            },
        });
    }

    function shippingEdit(input) {
        id = $(input).attr('data-id');
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_address_book/'+id,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $("#shippingAddressForm").find("#first_name").val(data.data.first_name);
                    $("#shippingAddressForm").find("#last_name").val(data.data.last_name);
                    $("#shippingAddressForm").find("#postcode").val(data.data.postcode);
                    $("#shippingAddressForm").find("#location").val(data.data.latlong);
                    
                    country = state = '';
                    if(data.data.country_id != 'null' && data.data.country_id != null && data.data.country_id != ''){
                        country = data.data.country_id.country_id;
                    }
                    if(data.data.state_id != 'null' && data.data.state_id != null && data.data.state_id != ''){
                        state = data.data.state_id.id;
                    }
                    countries();
                    $("#shippingAddressForm").find("#country_id_hidden").val(country);
                    $("#shippingAddressForm").find("#state_id_hidden").val(state);
                    $("#shippingAddressForm").find("#city").val(data.data.city);
                    $("#shippingAddressForm").find("#street_address").val(data.data.street_address);
                    $("#shippingAddressForm").find("#gender").val(data.data.gender);
                    $("#shippingAddressForm").find("#dob").val(data.data.dob);
                    $("#shippingAddressForm").find("#phone").val(data.data.phone);
                    $("#shippingAddressForm").find("#method").val('put');
                    $("#shippingAddressForm").find("#addres_id").val(id);
                }
            },
            error: function(data) {},
        });
    }

    function shippingDelete(input) {
        id = $(input).attr('data-id');
        $.ajax({
            type: 'delete',
            url: "{{ url('') }}" + '/api/client/customer_address_book/'+id,
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    $(input).closest('tr').remove();
                    toastr.error('{{ trans("response.shipping-remove-successfully") }}');

                }
                else{
                    toastr.error('{{ trans("response.some_thing_went_wrong") }}');
                }
            },
            error: function(data) {
                // toastr.error(data.responseJSON.message);
                toastr.error('{{ trans("response.some_thing_went_wrong") }}');
            },
        });
    }
</script>

<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkfQ--NrbuRkdYSFBu1AXlWohPV7RhNyI&libraries=places&callback=initialize"
        async defer></script>
    <script>
        var markers;
        var myLatlng;
        var map;
        var geocoder;

        function setUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    myLatlng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    markers.setPosition(myLatlng);
                    map.setCenter(myLatlng);

                }, function() {});
            }
        }

        function saveAddress() {
            var latlng = markers.getPosition();
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        var street = "";
                        var state = "";
                        var country = "";
                        var city = "";
                        var postal_code = "";

                        for (var i = 0; i < results[0].address_components.length; i++) {
                            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                                switch (results[0].address_components[i].types[b]) {
                                    case 'locality':
                                        city = results[0].address_components[i].long_name;
                                        break;
                                    case 'administrative_area_level_1':
                                        state = results[0].address_components[i].long_name;
                                        break;
                                    case 'country':
                                        country = results[0].address_components[i].long_name;
                                        break;
                                    case 'postal_code':
                                        postal_code = results[0].address_components[i].long_name;
                                        break;
                                    case 'route':
                                        if (street == "") {
                                            street = results[0].address_components[i].long_name;
                                        }
                                        break;

                                    case 'street_address':
                                        if (street == "") {
                                            street += ", " + results[0].address_components[i].long_name;
                                        }
                                        break;
                                }
                            }
                        }
                        // $("#postcode").val(postal_code);
                        // $("#street").val(street);
                        // $("#city").val(city);


                        // $("#entry_country_id").val(country);

                        $("#location").val(latlng);

                        // $("#entry_country_id option").filter(function() {
                        //   //may want to use $.trim in here
                        //   return $(this).text() == country;
                        // }).prop('selected', true);
                        // if(getZones("no_loader")){
                        //   $("#entry_zone_id option").filter(function() {
                        //     //may want to use $.trim in here
                        //     return $(this).text() == state;
                        //   }).prop('selected', true);
                        // }
                        $('#mapModal').hide();
                        $('.modal-backdrop').hide();
                        setTimeout(function() { 
                            // $('#location').focus();
                            $('#location').get(0).focus();
                           
                        }, 500);
                       

                    } else {
                        console.log('No results found');
                    }
                } else {
                    console.log('Geocoder failed due to: ' + status);
                }
            });
        }

        function initialize() {
            defaultPOS = {
                lat: '31.4',
                lng: '71.1'
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultPOS,
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            geocoder = new google.maps.Geocoder;
            markers = new google.maps.Marker({
                map: map,
                draggable: true,
                position: defaultPOS
            });



            var infowindow = new google.maps.InfoWindow;
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                var bounds = new google.maps.LatLngBounds();

                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    console.log(place.geometry.location);
                    // Create a marker for each place.
                    markers.setPosition(place.geometry.location);
                    markers.setTitle(place.name);


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
    </script>
@endsection