<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sunrise media </title>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/sample.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/samples.css') }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description"
        content="Try the latest sample of CKEditor 4 and learn more about customizing your WYSIWYG editor with endless possibilities.">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <style>
        .breadcrumb-active {
            position: relative;
            margin-right: 20%;
        }

        .breadcrumb-active::after {
            content: '/';
            position: absolute;
            left: 115%;
        }
    </style>


    {{-- Data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>

    <div id="main">

        @guest
            <div class="main-container" style="height: 90vh;overflow-y:scroll">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        @endguest
        @auth
            @include('components.admin.sidebar')
            <section class="home-section">

                @include('components.admin.navbar')

                <div class="main-container" style="height: 90vh;overflow-y:scroll">
                    <main class="">
                        @yield('content')
                    </main>
                </div>
            </section>
        @endauth
    </div>


    <main>



    </main>
    {{-- <div ></div> --}}
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        initSample();
    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        $(document).on('click', '.arrow', function() {

            $(this).parent().toggleClass("showMenu");

        });
    </script>
    <script>
        // Get the input element and preview image element
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        // Add an event listener to the input element
        imageInput.addEventListener('change', function(e) {
            // Get the selected file from the input
            const file = e.target.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the FileReader onload event
                reader.onload = function() {
                    // Set the preview image source to the FileReader result
                    previewImage.src = reader.result;
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, reset the preview image source
                previewImage.src = "#";
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        function changeTrending(id) {
            var checkBox = document.getElementById(id);
            if (checkBox.checked == true) {
                addTrending(id);
            } else {
                removeTrending(id);
            }
        }

        function addTrending(id) {
            // alert("fdsff");
            $.ajax({
                url: '{{ route('trending.store') }}',
                type: 'POST',
                dataType: 'json',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "post_id": id,
                },
                success: function(response) {},
                error: function(xhr) {}
            });


        }

        function removeTrending(id) {
            $.ajax({
                url: '{{ route('trending.delete') }}',
                type: 'POST',
                dataType: 'json',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "post_id": id,
                },
                success: function(response) {},
                error: function(xhr) {}
            });
        }
    </script>

    <script>
        $("#category").on("change", function() {
            var category_id = $(this).find(":selected").val();
            // var id = $("input[name=editId]").val();
            var url = "{{ route('subcategory.get', ':id') }}";
            url = url.replace(':id', category_id);

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    $('#mySelect').empty();
                    $('#mySelect').append($('<option>', {
                        value: "",
                        text: "Select sub category"
                    }));
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i = 1;
                    for (var i = 0; i < dataResult.length; i++) {
                        subCategory(dataResult[i].id, dataResult[i].name);
                        // console.log(dataResult[i].name);
                    }

                }
            });


        });

        function subCategory(id, name) {
            $('#mySelect').append($('<option>', {
                value: id,
                text: name
            }));
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <script>
        $("#toggle").click(function(){
            $("#sidebar").toggleClass('active');
        });

        $("#btnClose").click(function(){
            $("#sidebar").toggleClass('active');
        });
    </script>
</body>


</html>
