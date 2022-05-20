@extends('layouts.master')
@section('content')
@include(isset(getSetting()['about_us_web']) ? 'includes.aboutus.aboutus-'.getSetting()['about_us_web'] : 'includes.aboutus.aboutus-style1')


   
@endsection
@section('script')
@endsection