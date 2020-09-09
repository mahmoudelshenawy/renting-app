    <!-- START: Main Menu-->
    <div class="sidebar">
        <a href="#" class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
            <i class="icon-close"></i>
        </a>
        <!-- START: Logo-->
        <a href="{{ url('admin') }}" class="sidebar-logo d-flex">
            <img src="{{ asset('dist/images/logo.png') }}" alt="logo" width="25" class="img-fluid mr-2"/>
            <span class="h5 align-self-center mb-0">RENT</span>        
        </a>
        <!-- END: Logo-->

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown"><a href="{{ url('admin') }}"><i class="icon-speedometer"></i>{{ trans('admin.dashboard') }}</a> 
               
            </li>
            <li class="dropdown"><a href="#"><i class="fas fa-camera-retro"></i>{{ trans('rent.profile') }}</a> 
               
            </li>

            <li class="dropdown {{active('admins')}}" ><a href="{{ aurl('admins') }}"><i class="fas fa-users-cog"></i>{{ trans('admin.admins') }}</a>              
            </li>

            <li class="dropdown {{active('apartments')}}"  ><a href="{{ aurl('apartments') }}"><i class="fas fa-warehouse"></i>{{ trans('rent.appartments') }}</a>              
            </li>

            <li class="dropdown  {{active('rentants')}}" ><a href="{{ aurl('rentants') }}"><i class="fas fa-users"></i>{{ trans('rent.rentants') }}</a>              
            </li>
            <li class="dropdown {{active('leases')}}"  ><a href="{{ aurl('leases') }}"><i class="fas fa-book-open"></i>{{ trans('rent.leases') }}</a>              
            </li>
        </ul>
        {{-- <ul id="side-menu" class="sidebar-menu">
             <li class="dropdown"><a href="#" class="text-danger"><i class="icon-cursor-move"></i>New<span class="ml-2 badge badge-danger">New</span></a>
                <div>
                    <ul>
                        <li><a href="app-timeline.html"><i class="icon-calendar"></i> Time LIne</a></li>
                        <li><a href="app-task-board.html"><i class="icon-speech"></i> Todo</a></li>
                        <li><a href="app-tickets.html"><i class="icon-support"></i> Tickets</a></li>   
                        <li><a href="app-multi-input.html"><i class="icon-support"></i> Multi Input</a></li>   
                    </ul>
                </div>
        </ul> --}}
        <!-- END: Menu-->
    </div>
    <!-- END: Main Menu-->