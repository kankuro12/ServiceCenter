@extends('back.layouts.app')
@section('title', 'Single Job Seeker')
@section('content')

    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page">
                <!-- .page-inner -->
                <div class="page-inner">
                    <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h5 class=" w-100"> Job - #{{ $job->id }}
                                    <hr class="my-1">
                                    {{ $job->title }}
                                    <hr class="my-1">
                                </h5><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body p-4">

                            <table class="table table-bordered ">
                                <tr>
                                    <th>REF ID</th>

                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Due Date</th>

                                    <th>Openings</th>
                                    <th>Experience</th>
                                    <th>Posted By</th>
                                    <th>Posted</th>
                                </tr>
                                <tr>
                                    <td>{{ $job->id }}</td>

                                    <td>{{ $job->designation }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->lastdate->format('d-m-Y') }}</td>
                                    <td>{{ $job->opening }}</td>
                                    <td>{{ $job->exp }}</td>
                                    <td>{{ $job->user->name }}</td>
                                    <th>{{ $job->created_at->diffForHumans() }}</th>
                                </tr>
                            </table>
                            <div class="list">
                                <div class="row">
                                    @if (isset($info['basename']))
                                        <div class="col-md-6">
                                            <h4>Files</h4>
                                            <hr>

                                            <div class="p-2">

                                                @if ($isimage)
                                                    <img src="{{ asset($job->file) }}" alt="" class="w-100">
                                                @endif
                                                <div class="form-control p-2 d-flex justify-content-between">
                                                    <span>
                                                        {{ $info['basename'] }}
                                                    </span>
                                                    <a href="{{ asset($job->file) }}" target="_blank"
                                                        class="">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="{{ isset($info['basename']) ? 'col-md-6' : 'col-md-12' }}">
                                        <h4>Job Detail</h4>
                                        <hr>
                                        <div class="p-2">
                                            {!! $job->desc !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- /.card-body -->

                    </div>
                    <div class="bg-white shadow mb-4">
                        <div class="card-body ">
                            <h5 class="d-flex align-items-center justify-content-between">
                                <span>

                                    Applications For Job
                                </span>
                                <button class="btn btn-success" id="dataExport">
                                    Export
                                </button>
                            </h5>
                            <hr class="mt-1">
                            @foreach ($job->applicants as $applicant)
                                <div class="row d-none d-md-flex">
                                    <div class="col-md-3">
                                        <strong>Name</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Address</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Phone</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Email</strong>
                                    </div>
                                    <div class="col-12">
                                        <hr class="my-1">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <strong class="d-block d-md-none">
                                            Name
                                        </strong>
                                        <div>
                                            {{ $applicant->name }}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <strong class="d-block d-md-none">
                                            Address
                                        </strong>
                                        <div>
                                            {{ $applicant->address }}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <strong class="d-block d-md-none">
                                            Phone
                                        </strong>
                                        <div>
                                            {{ $applicant->phone }}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <strong class="d-block d-md-none">
                                            Email
                                        </strong>
                                        <div>
                                            {{ $applicant->email }}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <strong class="d-block d-md-none">

                                        </strong>
                                        <div>
                                            <a target="_blank" href="{{ route('resume.view', ['user' => $applicant->user_id]) }}">View
                                                Resume</a>
                                            {{-- <a href="">View Resume</a> --}}
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-md-none">
                                        <hr class="my-1">
                                    </div>

                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

@endsection
@section('scripts')
<script src="{{asset('front/axios.js')}}"></script>
<script>
    $(function () {
        $('#dataExport').click(function(e) {
                e.preventDefault();
                axios.get('{{ route('admin.job-export', ['job' => $job->id]) }}')
                    .then((res) => {
                        window.open(res.data);
                    });
            });
    });
</script>
@endsection
