@extends('layouts.master')
@section('content')

@include(isset(getSetting()['contact_us']) ? 'includes.contactus.contactus-'.getSetting()['contact_us'] : 'includes.contactus.contactus-style1')


@endsection
@section('script')

<script>

    $("#contactusForm").submit(function(e){
        e.preventDefault();
        $('.invalid-feedback').css('display','none')
        first_name = $.trim($("#first_name").val());
        last_name = $.trim($("#last_name").val());
        email = $.trim($("#email").val());
        phone = $.trim($("#phone").val());
        message = $.trim($("#message").val());

        $.ajax({
        type: 'post',
        url: "{{ url('') }}" + '/api/client/contact-us',
        data:{
            first_name:first_name,
            last_name:last_name,
            email:email,
            phone:phone,
            message:message
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            clientid: "{{isset(getSetting()['client_id']) ? getSetting()['client_id'] : ''}}",
            clientsecret: "{{isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : ''}}",
        },
        beforeSend: function() {},
        success: function(data) {
            if (data.status == 'Success') {
                toastr.success('{{ trans("response.contact-form-success") }}');
                $("#first_name").val('');
                $("#last_name").val('');
                $("#email").val('');
                $("#phone").val('');
                $("#message").val('');
            }
            else{
                toastr.error('{{ trans("response.some_thing_went_wrong") }}');
            }
        },
        error: function(data) {
            // console.log(data);
            if(data.status == 422){
                jQuery.each(data.responseJSON.errors, function(index, item) {
                    $("#"+index).parent().find('.invalid-feedback').css('display','block');
                    $("#"+index).parent().find('.invalid-feedback').html(item);
                });
            }
            else{
                toastr.error('{{ trans("response.some_thing_went_wrong") }}');;
            }

        },
        });
    });
</script>
@endsection
