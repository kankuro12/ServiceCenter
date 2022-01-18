@php
    $user=Auth::user();
@endphp
<div class="" >
    <div class="text-center my-2">
        <img style="height:60px;" src="{{asset(custom_config('logo')->value??'')}}" alt="">
    </div>
    <div style="background: #E6F5FA;padding: 10px 0px 40px 0px;border-top-right-radius: 35px;">

        <div class="">
            @include('Need.vendor.dashboard.image')
            @include('Need.vendor.dashboard.name')

        </div>
    </div>
    <div class="menu">
        <div class="text-center">
            <a href="{{route('n.front.home')}}" class="btn text-blue " >
                <span class="material-icons">
                    public
                </span>
                Home
            </a>
            <a href="{{route('n.front.vendor.index')}}" class="btn btn-sm text-blue " >
                <span class="material-icons">
                    home
                </span>
                Dashboard
            </a>
            <a href="{{route('n.front.vendor.manage-profile')}}" class="btn text-blue " >
                <span class="material-icons">
                    manage_accounts
                </span>
                Manage Profile
            </a>
            @if ($user->role==2)
                <a href="{{route('n.front.vendor.posted-job.index')}}" class="btn text-blue " >
                    <span class="material-icons">
                        work_outline
                    </span>
                    Posted Jobs
                </a>
            @endif
            @if ($user->role==3)
                <a href="{{route('n.front.vendor.appliedJobs')}}" class="btn text-blue " >
                    <span class="material-icons">
                        work_outline
                    </span>
                    Applied Jobs
                </a>
                <a href="{{route('resume.index')}}" target="_blank" class="btn text-blue " >
                    <span class="material-icons">
                        description
                    </span>
                    My Resume
                </a>
                <a href="{{route('n.front.all-category')}}" target="_blank" class="btn text-blue " >
                    <span class="material-icons">
                        work_outline

                    </span>
                    Search Job
                </a>
            @endif

            <a href="{{route('resume.index')}}" class="btn text-blue " >
                <span class="material-icons">
                    subtitles
                </span>
                My Subscriptions
            </a>
            <a href="{{route('n.front.vendor.orders')}}" class="btn text-blue " >
                <span class="material-icons">
                    list_alt
                </span>
                My Orders
            </a>
            <a href="{{route('n.front.vendor.deliveries')}}" class="btn text-blue " >
                <span class="material-icons">
                    delivery_dining
                </span>
                Deleveries
            </a>
            <a href="{{route('n.front.logout')}}" class="btn text-blue " >
                <span class="material-icons">
                    logout
                </span>
                Logout
            </a>

        </div>
    </div>
</div>
