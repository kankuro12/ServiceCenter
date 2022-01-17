@extends('Need.vendor.dashboard.index')
@section('newcss')

@endsection
@section('jumbo')
<span>
    Posted Jobs
</span>
@endsection
@section('buttons')
    <a href="{{route('n.front.vendor.posted-job.add')}}" class="btn btn-sm btn-primary text-white">Post New Job</a>
@endsection
@section('newtitle', 'Posted Jobs')

@section('newcontent')

    <div class="bg-white shadow d-none d-md-block">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>#REF ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Posted</th>
                    <th>Applicants</th>
                    <th>Last Date</th>
                    <th></th>
                </tr>
                @foreach ($jobs as $job)
                    <tr>
                        <th>
                            {{$job->id}}
                        </th>
                        <td>{{$job->title}}</td>
                        <td>{{$job->category}}</td>
                        <td>{{$job->updated_at->diffForHumans()}}</td>
                        <td>{{$job->applicants}}</td>
                        <td>{{$job->lastdate->format('d-m-Y')}}</td>
                        <td>
                            <a href="{{route('n.front.vendor.posted-job.view',['job'=>$job->id])}}" class="btn btn-sm btn-link">View</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @foreach ($jobs as $job)

        <div class=" bg-white shadow d-block d-md-none mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <strong>
                            Title
                        </strong>
                        <div>
                            {{$job->title}}
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>
                            Category
                        </strong>
                        <div>
                            {{$job->category}}
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>
                            Posted
                        </strong>
                        <div>
                            {{$job->updated_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>
                            Applicants
                        </strong>
                        <div>
                            {{$job->applicants}}
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>
                            Due Date
                        </strong>
                        <div>
                            {{$job->lastdate->format('Y-m-d')}}
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="my-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('n.front.vendor.posted-job.view',['job'=>$job->id])}}" class="text-primary mx-2"> View</a>
                            <a href="" class="text-danger mx-2"> Delete</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('includejs')

@endsection
@section('newjs')
    <script>

    </script>
@endsection
