<!-- Side Of Navbar -->
 {{-- <ul class="navbar-nav animate side-nav">

    @can('isAdmin')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/users')}}" title="Manage user"><i class="fa fa-users icons"></i> Manage Users <i class="fa fa-users fa-2x shortmenu animate iconsS"></i></a>
    </li>
   @endcan

    @cannot('isCustomer')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/Loans_management')}}" title="Manage Loans"><i class="fa fa-handshake-o icons"></i> Manage Loans <i class="fa fa-handshake-o fa-2x shortmenu animate iconsS"></i></a>
    </li>
     @endcannot

     @can('isAdmin')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/sms_management')}}" title="manage sms"><i class="fa fa-envelope icons"></i> Sms Management <i class="fa fa-envelope fa-2x shortmenu animate iconsS"></i></a>
    </li>
    @endcan

        @can('isAdmin')
        <li class="nav-item">
            <a class="nav-link" href="{{url('/user_suggestions')}}" title="User Suggestion"><i class="fa fa-bell icons"></i> User Suggestion <i class="fa fa-bell fa-2x shortmenu animate iconsS"></i></a>
        </li>
        @endcan

</ul>  --}}


<ul class="app-menu">
    <li><a class="app-menu__item active" href="{{ url('/home') }}"><i class="app-menu__icon fa fa-home"></i><span
                class="app-menu__label">Home</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">LOANS</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
           
            <li><a class="treeview-item" href="{{url('Loans_management')}}"><i class="icon fa fa-circle-o"></i>
                    manage loans</a></li>
           
           
          
           

        </ul>
    </li>


    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-comment"></i><span class="app-menu__label">SMS</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{url('/sms_management')}}"><i class="icon fa fa-circle-o"></i>
                    manage sms</a></li>
           
        </ul>
    </li>

  @can('isAdmin')
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-users"></i><span class="app-menu__label">USERS</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{url('/users')}}"><i class="icon fa fa-circle-o"></i>
                    manage users </a></li>
    
        </ul>
    </li>
  @endcan

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">SUGGESTIONS</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{url('/user_suggestions')}}"><i class="icon fa fa-circle-o"></i>
                  view  </a></li>
    
        </ul>
    </li>


</ul>
