<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sebn - table two</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" href="apple-icon.png" />
    <link rel="shortcut icon" href="favicon.ico" />

    <link
      rel="stylesheet"
      href="{{asset('backend/admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('backend/admin_assets/vendors/font-awesome/css/font-awesome.min.css')}}"
    />

    <link rel="stylesheet" href="{{asset('backend/admin_assets/vendors/themify-icons/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/admin_assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/admin_assets/vendors/selectFX/css/cs-skin-elastic.css')}}" />
    <link
      rel="stylesheet"
      href="{{asset('backend/admin_assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('backend/admin_assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
    />

    <link rel="stylesheet" href="{{asset('backend/admin_assets/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/admin_assets/assets/css/style2.css')}}" />

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
      rel="stylesheet"
      type="text/css"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
<body>
  <!--header-->
  @include('admin.body.topbar')
  <!--end-header-->


    <!--sidebar-->
  @include('admin.body.sidebar')
    <!--end-sidebar-->

      <!--content-->
      <div class="content mt-3">
    <!-- the working one -->
    <form method="GET" action="{{ route('view.pageone') }}">
        <div class="">
            <!-- Select By Dropdown (dynamically filled) -->
            <div class="">
                <select id="selectBy" name="selectOption" class="custom-select1">
                    <option selected disabled>FILTER BY</option>
                    <option value="WHS">Warehouse (WHS)</option>
                    <option value="KEYS">Keys</option>
                    <option value="MENU">Menu</option>
                </select>
            </div>

            <!-- Options Dropdown (Dynamic) -->
            <div class="">
                <select id="options" name="optionsvalue" class="custom-select1">
                    <option selected disabled>OPTIONS</option>
                </select>
            </div>
        </div>

        <button type="submit" id="excel-btn" name="export" value="true" class="btn btn-success">Export to Excel</button>
        </form>
        
    </form>



    <!-- Table -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                </div>
            </div>
        </div>
    </div>
</div>


        <script>
$(document).ready(function(){
    let optionsData = @json($options);

    $('#selectBy').on('change', function() {
        let selectedColumn = $(this).val();
        let $options = $('#options');

        $options.empty().append('<option selected>OPTIONS</option>');
        optionsData[selectedColumn].forEach(value => {
            $options.append(new Option(value, value));
        });
    });

    $('#options').on('change', function() {
        let selectOption = $('#selectBy').val();
        let optionsvalue = $(this).val();

        $.ajax({
            url: '{{ route("view.pageone") }}',
            type: 'GET',
            data: { selectOption, optionsvalue },
            success: function(response) {
                let table = $('#bootstrap-data-table-export').DataTable(); // Get DataTable instance
                table.clear().draw(); // Clear existing table data

                response.data.forEach(row => {
                    table.row.add([
                        row.ACCOUNT,
                        row.WHS,
                        row.KEYS,
                        row.MENU
                    ]).draw(false); // Add new row and redraw table
                });
            }
        });
    });
});
</script>

<!-- Load jQuery first -->
<script src="{{ asset('backend/admin_assets/vendors/jquery/dist/jquery.min.js') }}"></script>

<!-- Load Bootstrap -->
<script src="{{ asset('backend/admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Load DataTables JS files -->
<script src="{{ asset('backend/admin_assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Initialize DataTables (Must be after DataTables scripts) -->
<script src="{{ asset('backend/admin_assets/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
<!--end-content-->
</body>
</html>
