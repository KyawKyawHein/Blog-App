<nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
          
          @auth
            @if(auth()->user()->can("admin"))
            <a href="/admin/blogs/create">Admin Dashboard</a>
            @endif
            <a class="nav-link">Welcome {{auth()->user()->name}}</a>
            <form action="/logout" class="nav-link" method="post">
              @csrf
              <button class="btn btn-outline-primary">Logout</button>
            </form>
          @else
          <a href="/login" class="nav-link">Login</a>
          @endauth
          <a href="#home" class="nav-link">Home</a>
          <a href="#blogs" class="nav-link">Blogs</a>
          <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
    </nav>