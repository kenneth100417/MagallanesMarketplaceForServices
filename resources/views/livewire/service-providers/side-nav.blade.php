
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link mt-3  {{ 'service_provider_dashboard' == request()->path() ? 'active' : ''}}" href="{{url('/service_provider_dashboard')}}">
                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
                
            </a>
            <a class="nav-link {{ 'service_provider_services' == request()->path() ? 'active' : ''}}" href="{{url('/service_provider_services')}} ">
                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-hands-helping"></i></div>
                Services 
            </a>
            <a class="nav-link {{ 'service_provider_appointments' == request()->path() ? 'active' : ''}}{{ 'view_appointment_calendar' == request()->path() ? 'active' : ''}}" href="{{url('/service_provider_appointments')}}">
                <div class="sb-nav-link-icon mx-3 " style="width: 20px !important"><i class="fas fa-calendar-alt"></i></div>
                Appointments <span title="Today's pending schedule" class="badge bg-danger position-absolute end-0 me-3" style="display: {{$count == 0 ? 'none':''}}">{{$count}}</span>
            </a>
            <a class="nav-link {{ 'service_provider_profile' == request()->path() ? 'active' : ''}}" href="{{url('/service_provider_profile')}}">
                <div class="sb-nav-link-icon mx-3" style="width: 20px !important"><i class="fas fa-user-alt"></i></div>
                Profile 
            </a>
        </div>
    </div>

