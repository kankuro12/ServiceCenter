@php
    $user=Auth::user();
@endphp
<div class="" >
    <div style="background: #E6F5FA;padding: 10px 0px 40px 0px;">
        <div class="">
            @include('Need.vendor.dashboard.image')
            @include('Need.vendor.dashboard.name')
            {{-- <hr class="my-1">
            <div class="d-flex justify-content-between info">
                <span>
                    <i class="material-icons">person</i> <span>Member Since</span>
                </span>
                <span>
                    {{$user->created_at->format('M')}}, {{$user->created_at->year}}
                </span>
            </div>
            <div class="d-flex justify-content-between info">
                <span>
                    <i class="material-icons">room</i> <span>From</span>
                </span>
                <span>
                    {{$user->address}}
                </span>
            </div> --}}
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
            <a href="" class="btn text-blue " >
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
                <a href="{{route('n.front.vendor.posted-job.index')}}" class="btn text-blue " >
                    <span class="material-icons">
                        work_outline
                    </span>
                    Applied Jobs
                </a>
                <a href="{{route('resume.index')}}" target="_blank" class="btn text-blue " >
                    <span class="material-icons">
                        description
                    </span>
                    Your Resume
                </a>
            @endif

            <a href="{{route('resume.index')}}" class="btn text-blue " >
                <span class="material-icons">
                    subtitles
                </span>
                Subscriptions
            </a>
            <a href="{{route('resume.index')}}" class="btn text-blue " >
                <span class="material-icons">
                    list_alt
                </span>
                Orders
            </a>
            <a href="{{route('n.front.vendor.deliveries')}}" class="btn text-blue " >
                <span class="material-icons">
                    delivery_dining
                </span>
                Deleveries
            </a>

        </div>
    </div>
</div>
