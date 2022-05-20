<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-login') }}</li>
            </ol>
        </div>
    </nav>
</div>

<!-- login Content -->
<section class="page-area pro-content">
    <div class="container">


        <div class="row">
            @if(getSetting()['authenticate_with_email_password'] == '1')
            <div class="col-12 col-sm-12 col-md-6">

                <div class="heading">
                    <h2>
                        {{ trans('lables.login-login') }}
                    </h2>
                    <hr>
                </div>
                <div class="col-12 registration-process">

                    <form id="loginForm">
                        <div class="row">
                            <div class="from-group mb-3 col-12">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-email') }}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="loginEmail" placeholder="{{ trans('lables.login-email') }}">
                                </div>
                                <small class="email errors d-none" style="color:red"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="from-group mb-3 col-12">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-password') }}</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="loginPassword" placeholder="{{ trans('lables.login-password') }}">
                                </div>
                                <small class="password errors d-none" style="color:red"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <button class="btn btn-secondary swipe-to-top" id="loginAccount">{{ trans('lables.login-login') }}</button>
                                <a href="{{ url('/change-password') }}" class="btn btn-link">{{ trans('lables.login-forget-password') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">

                <div class="heading">
                    <h2>
                        {{ trans('lables.login-create-account') }}
                    </h2>
                    <hr>
                </div>
                <div class="col-12 registration-process mb-0">

                    <form id="registerForm">
                        <div class="row">
                            <div class="from-group mb-3 col-12 col-md-6">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-first-name') }}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="registerFirstName" placeholder="{{ trans('lables.login-first-name') }}">
                                </div>
                                <small class="first_name errors d-none" style="color:red"></small>
                            </div>
                            <div class="from-group mb-3 col-12 col-md-6">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-last-name') }}</label>
                                <div class="input-group">

                                    <input type="text" class="form-control" id="registerLastName" placeholder="{{ trans('lables.login-last-name') }}">
                                </div>
                                <small class="last_name errors d-none" style="color:red"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="from-group mb-3 col-12">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-email') }}</label>
                                <div class="input-group">

                                    <input type="text" class="form-control" id="registerEmail" placeholder="{{ trans('lables.login-email') }}">
                                </div>
                                <small class="email errors d-none" style="color:red"></small>
                            </div>
                        </div>


                        <div class="row">
                            <div class="from-group mb-3 col-12">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-password') }}</label>
                                <div class="input-group">

                                    <input type="password" class="form-control" id="registerPassword" placeholder="{{ trans('lables.login-password') }}">
                                </div>
                                <small class="password errors d-none" style="color:red"></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="from-group mb-3 col-12">
                                <label for="inlineFormInputGroup">{{ trans('lables.login-confirm-password') }}</label>
                                <div class="input-group">

                                    <input type="password" class="form-control" id="registerConfirmPassword" placeholder="{{ trans('lables.login-confirm-password') }}">
                                </div>
                                <small class="confirm_password errors d-none" style="color:red"></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <button class="btn btn-light swipe-to-top" id="createAccount">{{ trans('lables.login-create-account') }}</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            @endif
            <div class="col-12 col-sm-12 my-5">
                <div class="registration-socials">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-xl-6 ">
                            {{ trans('lables.login-access-account') }}
                        </div>
                        <div class="col-12  col-xl-6 right">
                            @if(getSetting()['authenticate_with_google'] == 1)
                            <a href="{{url('/api/client/customer_login/google')}}" type="button" class="btn btn-google google-click"><i class="fab fa-google-plus-g"></i>&nbsp;Google</a>
                            @endif
                            @if(getSetting()['authenticate_with_facebook'] == 1)
                            <a href="{{url('/api/client/customer_login/facebook')}}"  type="button" class="btn btn-facebook facebook-click"><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a>
                            @endif
                            <!-- <button type="button" class="btn btn-twitter"><i class="fab fa-twitter"></i>&nbsp;Twitter</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

