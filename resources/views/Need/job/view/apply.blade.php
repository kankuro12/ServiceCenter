@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="shadow p-3 h-100">
                        <h4 class="job-title">
                            {{ $job->title }}
                        </h4>
                        <hr class="my-1">
                        <table class="w-100">
                            <tr>
                                <th class="w-25">Company:</th>
                                <td>{{ $job->user->company }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Posted:</th>
                                <td>{{ $job->created_at->format('d, M Y') }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Due Date:</th>
                                <td>{{ $job->lastdate->format('d, M Y') }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Designation:</th>
                                <td>{{ $job->designation }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Cateory:</th>
                                <td>{{ $job->category->name }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Salary:</th>
                                <td>{{ $job->salary }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Openings:</th>
                                <td>{{ $job->opening }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Position Type:</th>
                                <td>{{ $job->type == 1 ? 'Full Time' : 'Part Time' }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Education:</th>
                                <td>{{ $job->education }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Experience:</th>
                                <td>{{ $job->exp }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="shadow p-3 h-100">
                        <h4>
                            Enter Your Info
                        </h4>
                        <hr class="my-1">
                        @if (!$user->hasResume())
                            <div class="alert alert-danger" role="alert">
                                Your Resume Is Not Complete, <a href="{{route('resume.index',['job'=>$job->id])}}">Click Here To Complete your Resume.</a>
                            </div>
                        @endif
                        <form action="{{ route('n.front.apply-job', ['job' => $job->id]) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ $user->address }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="col-12">
                                    <label for="desc">Description / Extra points</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="py-2">
                                    <button class="btn btn-primary">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/normal.css') }}">
    <style>
        .big_section {
            color: #4d4d4d;
        }

        .job-title {
            color: #FE3F40;
        }

        .job-dates {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .company {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 5px;

        }

        .company-desc {
            font-size: 0.9rem;
        }

    </style>
@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js">
    </script>
    <script>
        $(document).ready(function() {
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
    </script>
@endsection
