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
        <i class=""></i>
      </button>
      <a class="navbar-brand" href=""
        ><img src="{{ asset('backend/admin_assets/images/SEBN-MA_logo.png') }}"
      /></a>
      <a class="navbar-brand hidden" href="./"
        ><img src="images/logo2.png" alt="Logo"
      /></a>
    </div>

    <!-- Check if the current route is for page one or page two -->
    @if(Route::currentRouteName() == 'view.pageone')
      <div class="page_two_button">
        <a href="{{ route('view.pagetwo') }}" class="styled-button">PAGE TWO</a>
      </div>
    @elseif(Route::currentRouteName() == 'view.pagetwo')
      <div class="page_two_button">
        <a href="{{ route('view.pageone') }}" class="styled-button">PAGE ONE</a>
      </div>
    @endif
  </nav>
</aside>
<!-- /#left-panel -->
