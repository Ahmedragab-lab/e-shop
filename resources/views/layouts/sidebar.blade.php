<div class="container-fluid">
    <div class="row">
      <!-- Left Sidebar start-->
      <div class="side-menu-fixed">
       <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
          <!-- menu item Dashboard-->
          <li>
            <a href="{{ route('home') }}" >
              <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('site.dashboard') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="#" >
              <div class="pull-left"><span class="right-nav-text" style="color: rgb(236, 65, 65)">{{ __('site.wolf') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('users.index') }}">
              <div class="pull-left"><i class="fa fa-address-book"></i><span class="right-nav-text">{{ __('site.admins') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('roles.index') }}">
              <div class="pull-left"><i class="fa fa-times-rectangle"></i><span class="right-nav-text">{{ __('site.permissions') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements1">
              <div class="pull-left"><i class="fa fa-id-card-o"></i><span class="right-nav-text">{{ __('component') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="elements1" class="collapse" data-parent="#sidebarnav">
              <li><a href="{{ route('cats.index') }}">categories</a></li>
              <li><a href="#">mp3</a></li>
              <li><a href="#">video</a></li>
            </ul>
          </li>
        </ul>
    </div>
  </div>
