<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>
@section('meta-tags')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Simantap Online Warranty Services">
    <meta name="author" content="Tatalogam Lestari">
    <meta name="keyword" content="Online Warranty Services, Online Warranty, Warranty Services, Garansi, Garansi Online, SiMantap, Produk SiMantap, Taso, Multi Roof, Sakura Roof, Fancy, Multi Sirap">
@show

    <link rel="shortcut icon" href="{{ asset('img/favicon2.png') }}">
    <title>@yield('title')</title>
    <!-- yielded = title, custom_style, body, custom_javascript -->
@section('styles')
    <!-- Bootstraps -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formValidation.min.css') }}" rel="stylesheet">

    <!-- Icons FontAwesome 4.7.0 -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- custom css -->
    <style>
        a:hover{cursor:pointer}

        /*** custom radios & checkboxes ***/
        input[type=radio].with-font,
        input[type=checkbox].with-font {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        input[type=radio].with-font ~ span:before,
        input[type=checkbox].with-font ~ span:before {
            font-family: FontAwesome;
            display: inline-block;
            content: "\f1db";  /* fa-circle-thin */
            letter-spacing: 10px;
            font-size: 1.2em;
            color: #535353;
            width: 1.4em;   /* reduce bounce */
        }
        input[type=radio].with-font:checked ~ span:before,
        input[type=checkbox].with-font:checked ~ span:before  {
            content: "\f00c";  /* fa-check */
            font-size: 1.2em;
            color: darkgreen;
            letter-spacing: 5px;
        }
        input[type=checkbox].with-font ~ span:before {
            content: "\f096";  /* fa-square-o */
        }
        input[type=checkbox].with-font:checked ~ span:before {
            content: "\f046";     /* fa-check-square-o */
            color: darkgreen;
        }
        input[type=radio].with-font:focus ~ span:before,
        input[type=checkbox].with-font:focus ~ span:before,
        input[type=radio].with-font:focus ~ span,
        input[type=checkbox].with-font:focus ~ span
        {
            color: green; /* highlight both box and label */
        }

    </style>
@show

@yield('custom_style')

</head>

@yield('body')

@section('javascripts')
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/popper-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/formValidation/formValidation.min.js') }}"></script>
    <script src="{{ asset('js/formValidation/framework/bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/pace-1.0.0.min.js') }}"></script>

    <!-- bootstrap tooltip -->
    <script src="{{ asset('js/tether-1.1.0.min.js') }}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('js/chart/chart-2.7.0.js') }}"></script>
    <script src="{{ asset('js/chart/utils.js') }}"></script>

    <!-- CoreUI main scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@show

@section('custom_functions')
    <script>
        function IsNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        function IsDate(arg) {
            var mydate = new Date(arg);

            if (mydate.toString() == "Invalid Date") {
                return false;
            }
            else return true;
        }

        function FormatDate(format,arg) {
            if(IsDate(arg)==true){
                var mydate = new Date(arg);
                return mydate.toLocaleFormat(format);
            }
            else return false;
        }

        function ConvertToCurrency(arg){
            var rupiah = '';
            var angkarev = arg.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
            return rupiah.split('',rupiah.length-1).reverse().join('') + ".00";
        }

        function DeformatCurrency(arg){
            return Math.round(arg.replace(/,/g,""));
        }

        function IsNumberKey(evt) {
            var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
            var charCode = e.which || e.keyCode;

            // backspace(8), number 0-9(48-57), and dot(46)
            if (charCode==8 || charCode==46 || (charCode >= 48 && charCode < 58)) return true;
            else return false;
        }

        //for invoice number
        function FormatNumberLength(num, length) {
            var r = "" + num;
            while (r.length < length) {
                r = "0" + r;
            }
            return r;
        }
    </script>
@show

@yield('custom_javascript')

</html>