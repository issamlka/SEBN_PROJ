<header class="navbar2">
  <div class="logo2">
    <img src="{{ asset('backend/admin_assets/images/SEBN-MA_logo.png') }}" alt="" />
  </div>
  <nav>
    <ul>
    <li><a href="{{ route('view.pagetwo') }}">Users</a></li>
      <li><a href="{{ route('view.pageone') }}">Keys Affectation</a></li>
    </ul>
  </nav>
  <div class="logout-container">
    <!-- Logout form -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
  </div>
</header>
