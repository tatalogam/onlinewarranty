@extends('layouts.main')

@section('title')
    Login Page
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
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>{{ trans('messages.header_login') }}</h1>
                            <p class="text-muted">{{ trans('messages.header_desc_login') }}</p>
                            <form action="/api/login" method="post" id="basicForm">
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
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">{{ trans('messages.btn_login') }}</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" id="btn_passwordremind" class="btn btn-link px-0">{{ trans('messages.link_forgot') }}</button>
                                    </div>
                                </div>
                            </form>

                            @foreach($errors->all(':message') as $message)
                                <div class="alert alert-info text-left">
                                    <a class="close" data-dismiss="alert">×</a>
                                    {{ $message }}
                                </div>
                            @endforeach()
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h1>{{ trans('messages.header_signup') }}</h1>
                                <p>{{ trans('messages.header_desc_signup') }}</p>
                                <button type="button" id="btn_registernow" class="btn btn-primary active mt-3">{{ trans('messages.btn_registernow') }}</button>
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
            $('#btn_registernow').click(function(){
                window.location.href="/register";
            });

            $('#btn_passwordremind').click(function(){
                window.location.href="/password";
            });

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
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop