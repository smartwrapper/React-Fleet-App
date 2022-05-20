@extends('layouts.master')
@section('content')
@include(isset(getSetting()['login']) ? 'includes.login.login-'.getSetting()['login'] : 'includes.login.login-style1')

@endsection
@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if(loggedIn == '1'){
        window.location.href = "{{url('/')}}";
    }

    $("#createAccount").click(function(e) {
        e.preventDefault();
        creatAcount();
    });


    $(".google-click").click(function() {
        localStorage.setItem("sociallite",'google');
    });

    $(".facebook-click").click(function() {
        localStorage.setItem("sociallite",'facebook');
    });

    @if(isset($_GET["code"]) && $_GET["code"] != '')
        code = "{{ isset($_GET['code']) ? $_GET['code'] : '' }}"
        scope = ''
        authuser = "{{ isset($_GET['authuser']) ? $_GET['authuser'] : ''}}"
        prompt = "{{ isset($_GET['prompt']) ? $_GET['prompt'] : '' }}"
        sociallite = localStorage.getItem("sociallite");
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" + '/api/client/customer_login/'+sociallite+'/callback?code='+code+'&scope='+scope+'&authuser='+authuser+'&prompt='+prompt,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                console.log(data.responseJSON.errors);
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#registerForm").find("."+index).html(value)
                        $("#registerForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    @endif

    function creatAcount() {
        firstname = $("#registerFirstName").val();
        lastname = $("#registerLastName").val();
        email = $("#registerEmail").val();
        pwd = $("#registerPassword").val();
        confirmpwd = $("#registerConfirmPassword").val();
        $(".errors").addClass('d-none');
        customerLogin = $.trim(localStorage.getItem("customerLoggedin"));
        if(customerLogin == '1'){
            toastr.error('{{ trans("already-logged-in") }}');
            return;
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if(cartSession == null || cartSession == 'null'){
            cartSession = '';
        }
        
        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_register',
            data:{
                first_name: firstname,
                last_name: lastname,
                email: email,
                password: pwd,
                confirm_password: confirmpwd,
                session_id:cartSession,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("cartSession",'');
                    window.location.href = "/";
                }
            },
            error: function(data) {
                console.log(data.responseJSON.errors);
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#registerForm").find("."+index).html(value)
                        $("#registerForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    }

    $("#loginAccount").click(function(e) {
        e.preventDefault();
        loginAcount();
    })

    function loginAcount() {
        email = $("#loginEmail").val();
        password = $("#loginPassword").val();
        $(".errors").addClass('d-none');
        customerLogin = $.trim(localStorage.getItem("customerLoggedin"));
        if(customerLogin == '1'){
            toastr.error('{{ trans("already-logged-in") }}');

            return;
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if(cartSession == null || cartSession == 'null'){
            cartSession = '';
        }
        
        $.ajax({
            type: 'post',
            url: "{{ url('') }}" + '/api/client/customer_login',
            data:{
                email: email,
                password: password,
                session_id:cartSession,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{isset($setting['client_id']) ? $setting['client_id'] : ''}}",
                clientsecret: "{{isset($setting['client_secret']) ? $setting['client_secret'] : ''}}",
            },
            beforeSend: function() {},
            success: function(data) {
                if(data.status == 'Success'){
                    localStorage.setItem("customerToken",data.data.token);
                    localStorage.setItem("customerHash",data.data.hash);
                    localStorage.setItem("customerLoggedin",'1');
                    localStorage.setItem("customerId",data.data.id);
                    localStorage.setItem("customerEmail",data.data.email);
                    localStorage.setItem("customerFname",data.data.first_name);
                    localStorage.setItem("customerLname",data.data.last_name);
                    localStorage.setItem("cartSession",'');
                    window.location.href = '/';
                }
            },
            error: function(data) {
                console.log(data);
                if(data.status == 422){
                    if(data.responseJSON.status == 'Error'){
                        $("#loginForm").find(".password").html(data.responseJSON.message)
                        $("#loginForm").find(".password").removeClass('d-none');
                    }
                }
                if(data.status == 422){
                    $.each( data.responseJSON.errors, function( index, value ){
                        $("#loginForm").find("."+index).html(value)
                        $("#loginForm").find("."+index).removeClass('d-none');
                    });
                }
            },
        });
    }
</script>
@endsection