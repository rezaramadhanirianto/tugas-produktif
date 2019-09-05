<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('datatables/dataTables.min.css')}}">
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables/datatables.select.min.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

</head>
<body>
    @yield('content')
</body>
    @if ($message = Session::get('success'))
        <div class="success" data-flashdata="{{ $message }}"></div>
    @endif
    @if ($message = Session::get('failed'))
        <div class="failed" data-flashdata="{{ $message }}"></div>
    @endif
    <script>
        $('.table-datatables').dataTable();
        const flashdatas = $('.failed').data('flashdata');
    if(flashdatas){
        swal({
            title: "Failed",
            text: flashdatas,
            type: "error",
        });
    }
    const flashdata = $('.success').data('flashdata');
    if(flashdata){
        swal({
            title: "Success",
            text: flashdata,
            type: "success",
        });
    }
    </script>
    
</html>