@extends('layouts.main')

@section('title')
Reset Password - Step 1
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
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>{{ trans('messages.header_reset') }}</h1>
                        <p class="text-muted">{{ trans('messages.header_desc_remind') }}</p>
                        <form action="/api/password" method="post" id="basicForm">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="input-group form-group">
                                <span class="input-group-addon">@</span>

                                <span class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="{{ trans('messages.holder_email') }}">
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-primary">{{ trans('messages.btn_submit') }}</button>
                                    <button type="button" id="btn_back" class="btn btn-primary">{{ trans('messages.btn_back') }}</button>
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
            </div>
        </div>
    </div>
</div>
@stop

@section('custom_javascript')
<script>
    $(document).ready(function ($) {
        $('#btn_back').click(function(){
            window.location.href="/cpanel";
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
                }
            }
        });
    });
</script>
@stop