<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One-To-Many Polymorphic Relationship Laratable</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
</head>
<body>

@yield('content')

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#one-to-many-poly").DataTable({
                serverSide: true,
                ajax: "{{ route('one_to_many_poly') }}",
                columns: [
                    { name: 'title' },
                    { name: 'url', searchable: false },
                    { name: 'post_Liked', orderable: false },
                ],
            });
        });
    </script>
</body>
</html>
