@extends('Need.vendor.dashboard.index')
@section('newcss')
    <style>
        .view-on .form-control {
            padding: 0px !important;
            border: none;
            font-size: 0.9rem;
            pointer-events: none;

        }

        .view-on label {
            font-size: 0.9rem;
        }

        .view-on .hide {
            display: none;
        }

    </style>
@endsection
@section('jumbo')
    <a href="{{ route('n.front.vendor.posted-job.index') }}">
        Posted Jobs
    </a>
    <span>
        {{ $job->title }}
    </span>
@endsection
@section('buttons')
    <button id="init-edit-btn" class="btn btn-sm btn-success" onclick="initEdit(this);">
        Edit Job
    </button>
@endsection
@section('newtitle', 'Posted Jobs')

@section('newcontent')

    <div class="bg-white shadow mb-4">
        <div class="card-body ">
            {{-- <div class="selector-title">
        <span>Add A Job</span>
    </div>
    <div class="line"></div> --}}
            <div class="view-on" id="detail-holder">
                <form action="{{ route('n.front.vendor.posted-job.update', ['job' => $job->id]) }}" id="update-job-form"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="title" class="mb-1">Job Title*</label>
                                <input type="text" name="title" id="title" placeholder="Enter Job Title"
                                    class="form-control" required value="{{ $job->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="job_category_id" class="mb-1">Job Category*</label>
                                <select name="job_category_id" id="job_category_id" class="form-control" required>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $cat->id == $job->job_category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="salary" class="mb-1">Salary*</label>
                                <input type="text" name="salary" id="salary" placeholder="Enter Salary"
                                    class="form-control" required value="{{ $job->salary }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="designation" class="mb-1">Designation*</label>
                                <input type="text" name="designation" id="designation" placeholder="Enter Designation"
                                    class="form-control" required value="{{ $job->designation }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="education" class="mb-1">Education*</label>
                                <input type="text" name="education" id="education" placeholder="Enter Education Required"
                                    class="form-control" required value="{{ $job->education }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="exp" class="mb-1">Experience*</label>
                                <input type="text" name="exp" id="exp" placeholder="Enter Experience Required"
                                    class="form-control" required value="{{ $job->exp }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="opening" class="mb-1">Openings*</label>
                                <input type="number" name="opening" id="opening" placeholder="Enter Quotas"
                                    class="form-control" required value="{{ $job->opening }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="type" class="mb-1">Job Type*</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="1" {{ $job->type == 1 ? 'selected' : '' }}>Full Time</option>
                                    <option value="2">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="lastdate" class="mb-1">Apply Due Date*</label>
                                <input type="date" name="lastdate" id="lastdate" placeholder="Enter Lastdate"
                                    class="form-control" required value="{{ $job->lastdate->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 ">
                        <label for="" class="mb-1">Job Description*</label>
                        <textarea name="desc" id="desc" rows="5" class="form-control">{{ $job->desc }}</textarea>
                    </div>
                    <div class="form-group mb-2 py-2 hide">
                        <button class="btn btn-primary mr-2">Update Job</button>
                        <span onclick="cancelEdit();" class="btn btn-danger">
                            Cancel
                        </span>
                    </div>
                </form>
            </div>
        </div>
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
                        <strong>Phone</strong>
                    </div>
                    <div class="col-md-3">
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
                            Phone
                        </strong>
                        <div>
                            {{ $applicant->phone }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <strong class="d-block d-md-none">
                            Email
                        </strong>
                        <div>
                            {{ $applicant->email }}
                        </div>
                    </div>
                    <div class="col-md-3">
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

@endsection
@section('includejs')
    <script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
@section('newjs')
    <script>
        var $textareas;
        $(function() {
            $textareas = $('textarea');
            $textareas.each(function() { // to avoid the shrinking
                this.style.minHeight = this.offsetHeight + 'px';
            });

            $textareas.on('input', function() {
                this.style.height = '';
                this.style.height = this.scrollHeight + 'px';
            });

            $('#update-job-form').submit(function(e) {
                e.preventDefault();
                var fd = new FormData(this);
                axios.post(this.action, fd)
                    .then((res) => {
                        if (res.data.status) {
                            alert('Job Updated Sucessfully');
                            cancelEdit();
                        }
                    })
                    .catch((err) => {
                        alert('Job Not Updated, Please Try again.');

                    });
            });

            $('#dataExport').click(function(e) {
                e.preventDefault();
                axios.get('{{ route('n.front.vendor.posted-job.export', ['job' => $job->id]) }}')
                    .then((res) => {
                        window.open(res.data);
                    });
            });
            if (window.innerWidth > 768) {

                tinymce.init({
                    selector: '#desc',
                    plugins: [
                        '  advlist anchor autolink codesample fullscreen help image imagetools tinydrive',
                        ' lists link media noneditable  preview',
                        ' searchreplace table template  visualblocks wordcount'
                    ],
                    toolbar_mode: 'floating',
                });
            } else {
                $('#desc').addClass('form-control');
                $('#desc').css('height', '300px');
            }
        });

        function initEdit(ele) {
            $(ele).hide();
            $('#detail-holder').removeClass('view-on');
        }

        function cancelEdit() {
            $('#detail-holder').addClass('view-on');
            $('#init-edit-btn').show();
        }
    </script>
@endsection
