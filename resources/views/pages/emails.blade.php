<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>المركز التعليمي بالريث</title>
    <!--
    The style block is collapsed on page load to save you some scrolling.
    Postmark automatically inlines all CSS properties for maximum email client
    compatibility. You can just update styles here, and Postmark does the rest.
    -->
    <style type="text/css" rel="stylesheet" media="all">
        /* Base ------------------------------ */

        *:not(br):not(tr):not(html) {
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
        }

        body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            line-height: 1.4;
            background-color: #F2F4F6;
            color: #74787E;
            -webkit-text-size-adjust: none;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4;
            text-align: left;
        }

        a {
            color: #3869D4;
        }

        a img {
            border: none;
        }

        td {
            word-break: break-word;
        }
        /* Layout ------------------------------ */

        .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            background-color: #F2F4F6;
        }

        .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
        }
        /* Masthead ----------------------- */

        .email-masthead {
            padding: 25px 0;
            text-align: center;
        }

        .email-masthead_name {
            font-size: 16px;
            font-weight: bold;
            color: #bbbfc3;
            text-decoration: none;
            text-shadow: 0 1px 0 white;
        }
        /* Body ------------------------------ */

        .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            border-top: 1px solid #EDEFF2;
            border-bottom: 1px solid #EDEFF2;
            background-color: #FFFFFF;
        }

        .email-body_inner {
            width: 570px;
            margin: 0 auto;
            padding: 0;
            -premailer-width: 570px;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            background-color: #FFFFFF;
        }

        .email-footer p {
            color: #AEAEAE;
        }

        .body-action {
            width: 100%;
            margin: 30px auto;
            padding: 0;
            -premailer-width: 100%;
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            text-align: center;
        }

        .body-sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #EDEFF2;
        }

        .content-cell {
            padding: 35px;
        }

        .preheader {
            display: none !important;
            visibility: hidden;
            mso-hide: all;
            font-size: 1px;
            line-height: 1px;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
        }
        /* Attribute list ------------------------------ */

        .social td {
            padding: 0;
            width: auto;
        }

        /*Media Queries ------------------------------ */

        @media only screen and (max-width: 600px) {
            .email-body_inner {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
        /* Buttons ------------------------------ */

        .button {
            background-color: #3869D4;
            border-top: 10px solid #3869D4;
            border-right: 18px solid #3869D4;
            border-bottom: 10px solid #3869D4;
            border-left: 18px solid #3869D4;
            display: inline-block;
            color: #FFF;
            text-decoration: none;
            border-radius: 3px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
            -webkit-text-size-adjust: none;
        }

        .button--primary {
            background-color: #f1c600;
            border-top: 10px solid #f1c600;
            border-right: 18px solid #f1c600;
            border-bottom: 10px solid #f1c600;
            border-left: 18px solid #f1c600;
        }
        /* Type ------------------------------ */

        h1 {
            margin-top: 0;
            color: #2F3133;
            font-size: 19px;
            font-weight: bold;
            text-align: left;
        }

        h2 {
            margin-top: 0;
            color: #2F3133;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
        }

        h3 {
            margin-top: 0;
            color: #2F3133;
            font-size: 14px;
            font-weight: bold;
            text-align: left;
        }

        p {
            margin-top: 0;
            color: #74787E;
            font-size: 16px;
            line-height: 1.5em;
            text-align: left;
        }

        p.sub {
            font-size: 12px;
        }
    </style>
</head>
<body dir="rtl">

<header class="row justify-content-center">
    <img src="ImagePath().{{ asset('images/icon/brand-logo/logo1.png') }}" style="max-width: 60%; height: auto; margin: 0 auto">
</header>

<h5>Mail sent from : {{ $name }} </h5> 
<h5>Phone : {{$phone}} </h5> 
<h5>Mail : {{$mails}} </h5> 
<br>
<p>{{ $messages }}</p>
<br/>
<div class="col-xl-12 col-md-12 col-sm-12">
    <div class="footer-end">
        <p class="text-sm-center">{{ __('text.All_Rights_Reserved') }} &COPY;  <script>document.write(new Date().getFullYear());</script>  {{ config('app.name', 'Laravel') }}</p>
    </div>
</div>

</body>
</html>