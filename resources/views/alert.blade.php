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
        <!-- <p>{!! asset('css/sweetalert.css')!!}</p> -->
    <!-- Get ready to output some awesome notifications! -->
        <!-- @if (notify()->ready())
            <div class="alert alert-{{ notify()->type() }}">
                {{ notify()->message() }}
            </div>
        @endif -->
    
        <!-- <script src="{{ asset('js/sweetalert.min.js')}}"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <script>
            swal({
                title: 'Great job',
                type: 'success'
            });
        </script>
    </body>
</html>
