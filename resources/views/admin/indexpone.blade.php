<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <!-- the working one -->
    <form method="GET" action="{{ route('view.pageone') }}">
        <div class="row mb-3">
            <!-- Select By Dropdown -->
            <div class="col">
                <select id="selectBy" name="selectOption" class="form-select">
                    <option selected disabled>SELECT BY</option>
                    @foreach($columns as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Options Dropdown (Dynamic) -->
            <div class="col">
                <select id="options" name="optionsvalue" class="form-select">
                    <option selected disabled>OPTIONS</option>
                </select>
            </div>
        </div>

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>

    <a href="{{ route('view.pagetwo') }}" class="btn btn-primary mb-3">PageTwo</a>

    <!-- Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ACCOUNT</th>
                <th>WHS</th>
                <th>KEYS</th> <!-- Added KEYS column -->
                <th>MENU</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->ACCOUNT }}</td>
                <td>{{ $row->WHS }}</td>
                <td>{{ $row->KEYS }}</td> <!-- Display KEYS data -->
                <td>{{ $row->MENU }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    let optionsData = @json($options);

    $('#selectBy').on('change', function() {
        let selectedColumn = $(this).val();
        let $options = $('#options');

        $options.empty().append('<option selected disabled>OPTIONS</option>');
        optionsData[selectedColumn].forEach(value => {
            $options.append(new Option(value, value));
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
