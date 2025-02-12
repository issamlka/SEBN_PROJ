<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
  <!--<![endif]-->

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sufee Admin - HTML5 Admin Template</title>
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

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
      rel="stylesheet"
      type="text/css"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
<body>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#main-menu"
            aria-controls="main-menu"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="./"
            ><img src="{{asset('backend/admin_assets/images/SEBN-MA_logo.png')}}"
          /></a>
          <a class="navbar-brand hidden" href="./"
            ><img src="images/logo2.png" alt="Logo"
          /></a>
        </div>

        <!-- /.navbar-collapse -->
      </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
      <!-- Header-->

      <!-- /header -->
      <!-- Header-->

      <div class="breadcrumbs">
        <div class="col-sm-4">
          <div class="page-header float-left">
            <div class="page-title">
              <h1>Data Table 1</h1>
            </div>
          </div>
        </div>
        <!-- <div class="col-sm-8">
          <div class="page-header float-right">
            <div class="page-title">
              <ol class="breadcrumb text-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Table</a></li>
                <li class="active">Data table</li>
              </ol>
            </div>
          </div>
        </div>-->
      </div>

<div class="content mt-3">
    <!-- the working one -->
    <form method="GET" action="{{ route('view.pageone') }}">
        <div class="">
            <!-- Select By Dropdown (dynamically filled) -->
            <div class="">
                <select id="selectBy" name="selectOption" class="">
                    <option selected disabled>SELECT BY</option>
                    <option value="WHS">Warehouse (WHS)</option>
                    <option value="KEYS">Keys</option>
                    <option value="MENU">Menu</option>
                </select>
            </div>

            <!-- Options Dropdown (Dynamic) -->
            <div class="">
                <select id="options" name="optionsvalue" class="">
                    <option selected disabled>OPTIONS</option>
                </select>
            </div>
        </div>

        <div class="">
            <button type="submit" class="">Submit</button>
        </div>
    </form>



    <!-- Table -->
    <div class="content mt-3">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
    <table id="bootstrap-data-table-export"
    class="table table-striped table-bordered">
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

<script src="{{asset('backend/admin_assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/assets/js/main.js')}}"></script>

    <script src="{{asset('backend/admin_assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/admin_assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
