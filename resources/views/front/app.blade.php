<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon"
        href="{{ asset('storage') }}{{ '/' }}{{ App\Models\WebSetting::first()->fav_icon }}"
        type="image/x-icon">
@isset($post->id)

<meta property="og:title" content="{{$post->title}}">
<meta property="og:image" content="{{$post->thumbnail_img}}">
<meta property="og:image:secure_url" content="{{$post->thumbnail_img}}">
<link rel="image_src" href="{{$post->thumbnail_img}}"
<meta name="keywords" content="php,laravel,html,css">
 @endisset
{{-- <title>@yield('title')</title> --}}
    <title>{{ App\Models\WebSetting::first()->app_short_name }}{{ isset($title) ? $title : '' }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_2_3.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome_6_4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- AOS --}}
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap_4.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Khand:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Khand:wght@600&family=Mukta:wght@300&display=swap');

        .mukta {
            font-family: 'Mukta', sans-serif;
        }

        .mukta-light {
            font-family: 'Mukta', sans-serif;
        }

        .khanda {
            font-family: 'Khand', sans-serif;
        }
    </style>
</head>

<body>

    @yield('content')
</body>
<script src="{{ asset('js/bootstrap_5_2_3.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="{{ asset('js/proper.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script> --}}
<script src="{{ asset('js/bootstrap_4.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script> --}}
<script src="{{ asset('js/nepalijatepicker.js') }}"></script>
{{-- <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
type="text/javascript"></script> --}}
<script src="{{ asset('js/jquery_3_7.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script> --}}
<script>
    // alert(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'));

    var year=$('#todayYear').val();
    var month=$('#todayMonth').val();
    var day=$('#todayDay').val();
    var week=$('#todayWeek').val();

    // alert(NepaliFunctions.ConvertToUnicode(day));
    var todayDateIs = ConvEnglishToNepaliNum(day) + " " + month + " " + ConvEnglishToNepaliNum(
        year) + ", " +week;
        alert(todayDateIs);
    $('#date').html(todayDateIs);
</script>

<script>
    // const str=$(".txt-content").children().text();
    // const newStr=str.replace(/(<([^>]+)>)/gi, "");
    // $(".txt-content").children().html(newStr);
    $(".txt-content").children().css('text-align', 'center');
</script>

{{-- aos --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 150,
    });
</script>

<script>
    $(document).ready(function() {
        $(".open-AddBookDialog").click(function() {
            // $('#bookId').val($(this).data('id'));
            // alert($(this).data('iframe'));
            $("#video_content").append($(this).data('iframe'));
            $('#addBookDialog').modal('show');
        });
    });
</script>


{{-- Observe yop element --}}
<script>
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 200) {
            $("#title").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $("#title").removeClass("active");
        }
    });
</script>

</html>
