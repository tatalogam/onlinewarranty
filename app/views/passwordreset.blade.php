@extends('layouts.main')

@section('title')
    Reset Password - Step 2
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
                    <h1>{{ trans('messages.header_reset') }}</h1>
                    <p class="text-muted">{{ trans('messages.header_desc_reset') }}</p>
                    <form action="/api/password/reset" method="post" id="basicForm" >
                        <!-- csrf token for form protection -->
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <!-- reset password token -->
                        <input type="hidden" name="token" value="{{ $token }}">

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
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('messages.holder_password_confirm') }}">
                            </span>
                        </div>

                        <button type="submit" class="btn btn-block btn-success">{{ trans('messages.btn_createacct') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('custom_javascript')
<script>
    $(document).ready(function ($) {
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
                            field: 'password_confirmation',
                            message: '{{ trans("messages.identical_password") }}'
                        }
                    }
                },
                "password_confirmation": {
                    validators: {
                        notEmpty: {
                            message: '{{ trans("messages.required_password") }}'
                        },
                        identical: {
                            field: 'password',
                            message: '{{ trans("messages.identical_password") }}'
                        }
                    }
                }
            }
        });
    });
</script>
@stop