@extends('layouts.master')
@section('content')


    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-profile') }}</li>
                </ol>
            </div>
        </nav>
    </div>
    <section class="pro-content">

        <!-- Profile Content -->
        <section class="profile-content">
            <div class="container">
                <div class="row">

                    <div class="col-12 media-main">
                        <div class="media">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-6">
                                        <h4 class="profile-username">
                                        </h4>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-6 detail">

                                        <p class="mb-0">{{ trans('lables.profile-email') }}:<span
                                                class="profile-user-email">info@yourcompanyname.com</span></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="heading">
                            <h2>
                                {{ trans('lables.profile-my-account') }}
                            </h2>
                            <hr>
                        </div>

                        @include('includes.side-menu')
                    </div>
                    <div class="col-12 col-lg-9 ">
                        <div class="heading">
                            <h2>
                                {{ trans('lables.profile-prsonal-info') }}
                            </h2>
                            <hr>
                        </div>

                        <form class="align-items-center" id="profileForm">
                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label">{{ trans('lables.profile-first-name') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="first_name"
                                        placeholder="{{ trans('lables.profile-first-name') }}">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label">{{ trans('lables.profile-last-name') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="last_name"
                                        placeholder="{{ trans('lables.profile-last-name') }}">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label">{{ trans('lables.profile-gender') }}</label>
                                <div class="from-group  select-control col-sm-4 ">


                                    <select class="form-control " id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">

                                    </div>

                                </div>
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label">{{ trans('lables.profile-dob') }}</label>
                                <div class=" col-sm-4">
                                    <div class="input-group date">
                                        <input type="date" class="form-control datepicker" id="bday">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label">{{ trans('lables.profile-phone') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="{{ trans('lables.profile-phone') }}">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="method">
                            <input type="hidden" class="form-control" id="addres_id">
                            <button type="submit"
                                class="btn btn-secondary swipe-to-top saveProfile">{{ trans('lables.profile-update') }}</button>
                        </form>

                        <!-- ............the end..... -->
                    </div>
                </div>
            </div>
        </section>
    </section>


@endsection
@section('script')
    <script>
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        if (loggedIn != '1') {
            window.location.href = "{{ url('/') }}";
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        customerToken = $.trim(localStorage.getItem("customerToken"));
        customerId = $.trim(localStorage.getItem("customerId"));

        $(document).ready(function() {
            getProfile();
        });

        function getProfile() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/profile/' + customerId,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        $("#profileForm").find("#first_name").val(data.data.customer_first_name);
                        $("#profileForm").find("#last_name").val(data.data.customer_last_name);
                    }
                },
                error: function(data) {},
            });

            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/customer_address_book?is_default=1',
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        if (data.data != null && data.data != 'null' && data.data != '') {
                            $("#profileForm").find("#gender").val(data.data[0].gender);
                            $("#profileForm").find("#gender").trigger('change');
                            $("#profileForm").find("#dob").val(data.data[0].dob);
                            $("#profileForm").find("#phone").val(data.data[0].phone);
                            $("#profileForm").find("#method").val('put');
                            $("#profileForm").find("#addres_id").val(data.data[0].id);
                        } else {
                            $("#profileForm").find("#method").val('post');
                        }
                    }
                },
                error: function(data) {},
            });
        }

        $("#profileForm").submit(function(e) {
            e.preventDefault();
            var birth = $('#bday').val();
            if (birth != "") {

                var record = birth;

                var currentdate = new Date();

                var day1 = currentdate.getDate();

                var month1 = currentdate.getMonth();

                month1++;

                var year1 = currentdate.getFullYear() - 17;

                record = record.split("-")[0];
                if (record > year1) {
                    toastr.error('{{ trans('lables.profile-date-check') }}')
                    return
                }
            }

            first_name = $("#profileForm").find("#first_name").val();
            last_name = $("#profileForm").find("#last_name").val();

            $.ajax({
                type: 'put',
                url: "{{ url('') }}" +
                    '/api/client/profile/' + customerId,
                data: {
                    first_name: first_name,
                    last_name: last_name,
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
                        toastr.success('{{ trans('profile-updated-successfully') }}');
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {
                    console.log();
                    if (data.status == 422) {
                        jQuery.each(data.responseJSON.errors, function(index, item) {
                            $("#" + index).parent().find('.invalid-feedback').css('display',
                                'block');
                            $("#" + index).parent().find('.invalid-feedback').html(item);
                        });
                    } else {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
            });

            gender = $("#profileForm").find("#gender").val();
            dob = $("#profileForm").find("#dob").val();
            phone = $("#profileForm").find("#phone").val();
            method = $("#profileForm").find("#method").val();
            if (method == 'post') {
                url = '/api/client/customer_address_book';
            } else {
                ids = $("#profileForm").find("#addres_id").val();
                url = '/api/client/customer_address_book/' + ids;
            }

            $.ajax({
                type: method,
                url: "{{ url('') }}" + url,
                data: {
                    is_default: '1',
                    gender: gender,
                    first_name: first_name,
                    last_name: last_name,
                    dob: dob,
                    phone: phone,
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
                        $("#profileForm").find("#method").val('put');
                        $("#profileForm").find("#addres_id").val(data.data.id);
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {
                    console.log();
                    if (data.status == 422) {
                        jQuery.each(data.responseJSON.errors, function(index, item) {
                            $("#" + index).parent().find('.invalid-feedback').css('display',
                                'block');
                            $("#" + index).parent().find('.invalid-feedback').html(item);
                        });
                    } else {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
            });
        });
    </script>

@endsection
