@extends('layouts.main')

@section('title')
Sign Up
@stop

@section('custom_style')
    <style>
        /* custom css for feedback */
        .fv-control-feedback{
            top : 5px;
            left : -15px;
        }
    </style>
@stop

@section('body')
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1>{{ trans('messages.header_register') }}</h1>
                    <p class="text-muted">{{ trans('messages.header_desc_register') }}</p>
                    <form action="/api/register" method="post" files="true" enctype="multipart/form-data" id="basicForm" >
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <span class="input-group">
                                <input type="text" class="form-control" name="fname" placeholder="{{ trans('messages.holder_fname') }}">
                            </span>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="icon-user-follow"></i>
                            </span>
                            <span class="input-group">
                                <input type="text" class="form-control" name="lname" placeholder="{{ trans('messages.holder_lname') }}">
                            </span>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="fa fa-group"></i>
                            </span>
                            <span class="input-group">
                                <input type="text" class="form-control" name="username" placeholder="{{ trans('messages.holder_username') }}">
                            </span>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">@</span>
                            <span class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="{{ trans('messages.holder_email') }}">
                            </span>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <span class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="{{ trans('messages.holder_password') }}">
                            </span>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <span class="input-group">
                                <input type="password" class="form-control" name="password_repeat" placeholder="{{ trans('messages.holder_password_repeat') }}">
                            </span>
                        </div>


                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="icon-phone"></i>
                            </span>
                            <div class="input-group">
                                <input type="tel" class="form-control" name="handphone" placeholder="{{ trans('messages.holder_handphone') }}">
                            </div>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon">
                                <i class="fa fa-id-card"></i>
                            </span>
                            <span class="input-group">
                                <input type="text" class="form-control" name="nik" placeholder="{{ trans('messages.holder_nik') }}">
                            </span>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" for="file-input">{{ trans('messages.picture_nik') }}</label>
                            <div class="col-md-6">
                                <input type="file" id="picture_nik" name="picture_nik">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" for="file-input">{{ trans('messages.picture_profile') }}</label>
                            <div class="col-md-6">
                                <input type="file" id="picture_profile" name="picture_profile">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-success">{{ trans('messages.btn_createacct') }}</button>
                    </form>
                </div>
                <div class="card-footer p-4">
                    <div class="row">
                        <div class="col-12 text-right">
                            <p>
                                @if(Session::has('message'))
                                    {{ Session::get('message.content') }}
                                @else
                                    {{ trans('messages.have_an_account') }}
                                @endif
                                <button type="button" id="link_login" class="btn-link inline-block">{{ trans('messages.link_login') }}</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('custom_javascript')
<script>
    $(document).ready(function ($) {
        $('#link_login').click(function(){
            window.location.href="/cpanel";
        });

        //reset form on load
        $('#basicForm')[0].reset();

        $('#basicForm').formValidation({
            framework: 'bootstrap4',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                "fname": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_fname") }}'
                        }
                    }
                },
                "username": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_username") }}'
                        }
                    }
                },
                "email": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_email") }}'
                        }
                    }
                },
                "password": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_password") }}'
                        },
                        identical: {
                            field: 'password_repeat',
                            message: '{{ trans("messages.identical_password") }}'
                        }
                    }
                },
                "password_repeat": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_password") }}'
                        },
                        identical: {
                            field: 'password',
                            message: '{{ trans("messages.identical_password") }}'
                        }
                    }
                },
                "handphone": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_handphone") }}'
                        }
                    }
                },
                "nik": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_nik") }}'
                        }
                    }
                },
                "picture_nik": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_nik_pic") }}'
                        }
                    }
                },
                "picture_profile": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_profile_pic") }}'
                        }
                    }
                }
            }
        });
    });
</script>
@stop