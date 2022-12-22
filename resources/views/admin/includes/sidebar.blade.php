<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.home')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{activeAdminTab(null)}}">
                        <i class="nav-icon far fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.tasks.index')}}" class="nav-link {{activeAdminTab('tasks')}}">
                        <i class="nav-icon far fa fa-home"></i>
                        <p>Tasks</p>
                    </a>
                </li>                

                <li class="nav-item">
                    <a href="{{route('admin.statistics.index')}}" class="nav-link {{activeAdminTab('statistics')}}">
                        <i class="nav-icon far fa fa-home"></i>
                        <p>Statistics</p>
                    </a>
                </li>                

            </ul>
        </nav>
    </div>
</aside>