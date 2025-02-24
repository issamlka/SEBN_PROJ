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
      <div class="container mt-4">


<!-- Table -->
 <form>
 <button type="submit" id="excel-btn2" name="export" value="true" class="btn btn-success">
    <a href="{{ route('export.page.two') }}" style="color: white; text-decoration: none;">Export to Excel</a>
</button>
<div class="content mt-3">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">                
              <div class="card-body">
    <table id="bootstrap-data-table-export"
    class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ACCOUNT</th>
            <th>NAME</th>
            <th>MENU</th>
            <th>GS MENU</th>
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
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        
</form>



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
        <!--end-content-->
</body>
</html>
