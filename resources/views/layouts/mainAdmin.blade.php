<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
 
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  
  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">

  

 
  

  {{-- <title>DianWebsi | {{ $title }}</title> --}}

  <title>@yield('title')</title>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
     @include('partials.header')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SIUMPWR</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              {{-- <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li> --}}
              {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                  <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                  <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                  <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                  <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                  <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                  <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
              </li> --}}
              <li><a class="nav-link" href="/admin"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
             
              
              <li class="menu-header">Main Menu</li>
              <li><a class="nav-link {{ Request::is('logo') ? 'active' : ''}} " href="{{ route('logo.index') }}"><i class="fas fa-rocket"></i> <span>Logo</span></a></li>
              <li><a class="nav-link " href="{{ route('slider.index') }}"><i class="fas fa-rocket"></i> <span>Gambar Slider</span></a></li>
              <li><a class="nav-link " href="{{ route('frontpage.index') }}"><i class="fas fa-rocket"></i> <span>Halaman Depan</span></a></li>
              <li><a class="nav-link " href="{{ route('testimonial.index') }}"><i class="fas fa-rocket"></i> <span>Testimonial</span></a></li>
              <li><a class="nav-link " href="{{ route('structure.index') }}"><i class="fas fa-rocket"></i> <span>Struktur Organisasi</span></a></li>
              <li><a class="nav-link " href="{{ route('contact.index') }}"><i class="fas fa-rocket"></i> <span>Informasi Kontak</span></a></li>
              <li><a class="nav-link " href="{{ route('announcement.index') }}"><i class="fas fa-rocket"></i> <span>Pengumuman</span></a></li
              
              <li class="menu-header">Berita</li>
              <li><a class="nav-link  {{ Request::is('posts') ? 'active' : ''}}" href="{{ route('posts.index') }}"><i class="fas fa-book"></i> <span>Berita</span></a></li>
              <li><a class="nav-link " href="{{ route('category.index') }}"><i class="fas fa-rocket"></i> <span>Kategori</span></a></li>
            </ul>

            {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> --}}
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('container')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
    </div>
    
  

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/assets/js/stisla.js"></script>
  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="/assets/js/page/index.js"></script>
{{-- 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 

@stack('scripts')

</body>
</html>
