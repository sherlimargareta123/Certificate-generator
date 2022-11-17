<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APJII</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>
<style type="text/css">
    body {
        font-family: 'Roboto', sans-serif;
        width: 297mm;
        height: 210mm;
        margin-top: -35px !important;
    }

    .name {
        font-family: 'Dancing Script', cursive;
    }

    .date {
        font-family: 'Roboto Mono', sans-serif;
    }

    .certificate {
        width: 297mm;
        height: 210mm;
        background: url("{{ asset('template-certificate/apjii.jpg') }}");
        background-repeat: no-repeat;
        background-size: 297mm 210mm;
    }

    * {
        -webkit-print-color-adjust: exact !important;
        /* Chrome, Safari, Edge */
        color-adjust: exact !important;
        /*Firefox*/
    }
</style>

<body onload="window.print()">
    <div class="certificate">
        <div class="name">
            <h1 style="padding-top: 310px;padding-left:85px;font-size:75px">{{ $certificate->participant->user->name }}</h1>
        </div>
        <p style="padding-top: 20px;padding-left:72px;font-size:22px;font-weight:800">
            {{ $certificate->event->name }}
        </p>
        <div class="date">
            <p style="margin-top: 150px!important;padding-left:580px;font-size:18px;">
                {{ $certificate->event->date }}
            </p>
        </div>
    </div>
</body>

</html>
