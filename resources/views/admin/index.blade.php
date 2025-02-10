<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>
<body>
<div class="container mt-4">
<a href="{{ route('view.pageone') }}" class="btn btn-primary mb-3">PageOne</a>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ACCOUNT</th>
            <th>NAME</th>
            <th>MENU</th>
            <th>GS_MENU</th>
        </tr>
    </thead>
    <tbody>
    @foreach($types as $key => $item)
        <tr>
            <td>{{ $item->ACCOUNT }}</td>
            <td>{{ $item->NAME }}</td>
            <td>{{ $item->MENU }}</td>
            <td>{{ $item->GS_MENU }}</td>
        </tr>
    @endforeach
    </tbody>
</table> 
</div>
</body>
</html>
