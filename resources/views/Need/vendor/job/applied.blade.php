@extends('Need.vendor.dashboard.index')
@section('newcss')

@endsection
@section('jumbo')
<span>Applied jobs</span>
@endsection
@section('buttons')
<a href="{{route('n.front.all-category')}}">View Jobs</a>
@endsection
@section('newtitle', 'Applied Jobs')
@section('newcontent')
    @foreach ($applied_jobs as $applied)
        <div class="shadow mb-3 bg-white">
            <div class="card-body">
                <h6>
                    {{$applied->title}}
                </h6>
                <hr class="my-1">
                <div>
                    <strong>
                        Posted By
                    </strong>
                    <br>
                    {{$applied->company}}
                </div>
                <hr class="my-1">
                <div class="row">
                    <div class="col-md-4 d-flex d-md-block justify-content-between">
                       <div>
                           <strong>
                                Posted Date
                            </strong>
                        </div>
                        <div>
                            {{$applied->posted}}
                        </div>
                    </div>
                    <div class="col-md-4 d-flex d-md-block justify-content-between">
                        <div>
                            <strong>
                                 Due Date
                             </strong>
                         </div>
                         <div>
                             {{$applied->duedate}}
                         </div>
                     </div>
                     <div class="col-md-4 d-flex d-md-block justify-content-between">
                        <div>
                            <strong>
                                 Applied Date
                             </strong>
                         </div>
                         <div>
                             {{$applied->applied}}
                         </div>
                     </div>

                </div>
                <hr class="my-1">
                <div class="text-center text-md-end">
                    <a target="_blank" href="{{route('n.front.view-job',['job'=>$applied->job_provider_id])}}" class="btn btn-link">View Detail</a>
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
