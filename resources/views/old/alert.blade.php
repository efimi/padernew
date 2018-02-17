<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Notify</title>

        <!-- <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
       
        <script src="{{ asset('js/sweetalert.min.js')}}"></script>
         @if (notify()->ready())
        <script>
            swal({
                title: "{{ notify()->message()}}",
                type: "{{ notify()->type()}}",
            });
        </script>
        @endif
    </body>
</html>
