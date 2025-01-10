<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('Group 48095959.png')}}">
    <title>{{auth()->user('admin')->company_name}} | {{$page_title}}</title>
    <meta name="description" content="{{config('app.name')}}.com Member Area">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    

    <link rel="stylesheet" href="/member/assets/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/member/assets/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/member/assets/bootstrap.min.css" >
    <link rel="stylesheet" href="/member/assets/style1.css">
    <link rel="stylesheet" href="/member/assets/style2.css">


    <link rel="icon" type="image/png" href="/favicon.png" sizes="16x16">
    @yield('styles')
    <style>
        .col-md-6 img {
    max-width: 200px;
}
    </style>

  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">

        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="{{config('app.url')}}" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 130px;max-height:40px;" src="{{get_thumb_url_200('logo',"/".$basic_details->logo,1)}}" alt="{{config('app.name')}}">
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>

          <div class="nav-wrapper">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/home') ? 'active' : '' }}" href="/admin/home">
                  <i class="material-icons">person</i>
                  <span>Basic Details</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/banners') ? 'active' : '' }}" href="/admin/banners">
                  <i class="material-icons">list</i>
                  <span>Banners</span>
                </a>
              </li>              


              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/homepage/*') ? 'active' : '' }}" href="/admin/homepage/content">
                  <i class="material-icons">list</i>
                  <span>HomePage</span>
                </a>
              </li>


              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/aboutus/*') ? 'active' : '' }}" href="/admin/aboutus/content">
                  <i class="material-icons">list</i>
                  <span>About US</span>
                </a>
              </li>


              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/categories*') ? 'active' : '' }}" href="/admin/categories">
                  <i class="material-icons">list</i>
                  <span>Property Types</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/products*') ? 'active' : '' }}" href="/admin/products">
                  <i class="material-icons">list</i>
                  <span>Properties</span>
                </a>
              </li>
              
              
             <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/pages*') ? 'active' : '' }}" href="/admin/pages/index">
                  <i class="material-icons">list</i>
                  <span>Pages Meta Tags</span>
                </a>
              </li>

             <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/blog*') ? 'active' : '' }}" href="/admin/blog/index">
                  <i class="material-icons">list</i>
                  <span>Blogs</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/blogcomments*') ? 'active' : '' }}" href="/admin/blogcomments/index">
                  <i class="material-icons">list</i>
                  <span>Blog Comments</span>
                </a>
              </li> 
              
              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/inquiries*') ? 'active' : '' }}" href="/admin/inquiries/index">
                  <i class="material-icons">list</i>
                  <span>Inquiries</span>
                </a>
              </li>
              
             <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/redirection*') ? 'active' : '' }}" href="/admin/redirection/index">
                  <i class="material-icons">list</i>
                  <span>Redirections</span>
                </a>
              </li>     
              
             
              
              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/redirection*') ? 'active' : '' }}" href="/admin/generate-image-sitemap">
                  <i class="material-icons">list</i>
                  <span>Product Images Sitemap</span>
                </a>
              </li>
              
               <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/redirection*') ? 'active' : '' }}" href="/admin/robots/edit">
                  <i class="material-icons">list</i>
                  <span>Robots Edit</span>
                </a>
              </li>    
              
              
              <li class="nav-item">
                <a class="nav-link {{ Request::is('*admin/redirection*') ? 'active' : '' }}" href="/admin/sitemap/edit">
                  <i class="material-icons">list</i>
                  <span>Sitemap Edit</span>
                </a>
              </li> 
              
            </ul>
          </div>

        </aside>
        <!-- End Main Sidebar -->

        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
              </div>
              <div class="secondary-logo d-md-none mr-auto p-2">
                <img class="d-inline-block align-top mr-1" style="max-height: 32px;" src="/assets/images/logo.png" alt="{{config('app.name')}}">
              </div>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown" style="width: 200px;text-align: center;">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false" style="margin-top: 13px;">
                    <span class="d-md-inline-block">{{auth()->user()->name}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a target="_blank" class="dropdown-item" href="{{config('app.url')}}">
                      <i class="material-icons">&#xE7FD;</i> View Website</a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          @yield('content')


          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright © {{date('Y')}} <a href="{{strtolower(config('app.url'))}}" rel="nofollow">{{auth()->user('admin')->company_name}}</a>
            </span>
          </footer>
        </main>
      </div>
    </div>


    <script src="/member/assets/js/jquery.3.3.1.js" ></script>
    <script src="/member/assets/js/popper.js" ></script>
    <script src="/member/assets/js/bootstrap.min.js" ></script>
    <script src="/member/assets/js/jquery-ui.min.js"></script>
    <script src="/member/assets/js/shards-dashboards.1.1.0.js" ></script>


    @yield('scripts')
  </body>
</html>