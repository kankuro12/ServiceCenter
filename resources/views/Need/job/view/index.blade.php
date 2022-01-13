@extends('Need.layout')
@section('content')
    <div class="big_section">

        <div class="container">
            <div class="row">
                <div class="col-md-9 mb-3">
                    <h4 class="job-title">
                        {{ $job->title }}
                    </h4>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between job-dates">
                        <span>
                            <span class="d-inline-block">Job Posted on </span>
                            <span class="d-inline-block">{{ $job->created_at->format('d, M Y') }}</span>

                        </span>
                        <span class="text-end">
                            <span class="d-inline-block">
                                Apply Before
                            </span>
                            <span class="d-inline-block">
                                {{ $job->lastdate->format('d, M Y') }}
                            </span>
                        </span>
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <button id="bookmark-btn" class="btn btn-warning text-white w-100 mb-2">
                        <span id="bookmark">
                            BookMark
                        </span>
                        <i class="fa fa-bookmark"></i>
                    </button>
                    <a href="{{ route('n.front.apply-job', ['job' => $job->id]) }}"
                        class="btn btn-success text-white w-100 mb-2">
                        ApplyNow <i class="fa fa-check"></i>
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="company">
                        {{ $job->user->company }}
                    </div>
                    <hr class="my-1">
                    <div class="company-desc mb-4">
                        {{ $job->user->desc }}
                    </div>
                    <h4>
                        Job Details
                    </h4>
                    <hr class="my-1">
                    <table class="w-100">
                        <tr>
                            <th class="w-25">Designation</th>
                            <td>{{ $job->designation }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Cateory</th>
                            <td>{{ $job->category->name }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Salary</th>
                            <td>{{ $job->salary }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Openings</th>
                            <td>{{ $job->opening }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Position Type</th>
                            <td>{{ $job->type == 1 ? 'Full Time' : 'Part Time' }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Education</th>
                            <td>{{ $job->education }}</td>
                        </tr>
                        <tr>
                            <th class="w-25">Experience</th>
                            <td>{{ $job->exp }}</td>
                        </tr>
                    </table>
                    <hr class="my-2">
                    <div>
                        {!! $job->desc !!}
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
    <script>
        var myStorage = window.localStorage;
        var views = JSON.parse(localStorage.getItem('views'));
        var bookmarks =JSON.parse( localStorage.getItem('bookmarks'));
        var hasbookmark=false;
        $(document).ready(function() {

            if (views == undefined) {
                views = [];
            }
            if(bookmarks==undefined){
                bookmarks=[];
            }

            let instorage = false;

            views.forEach(view => {
                if (view.id == {{ $job->id }}) {
                    instorage = true;
                }
            });

            bookmarks.forEach(bookmark => {
                if (bookmark == {{ $job->id }}) {
                    hasbookmark = true;
                }
            });
            $('#bookmark').html(hasbookmark?"Remove Bookmark":"Bookmark");

            if (!instorage) {
                views.push({
                    id: {{ $job->id }},
                    title: "{{ $job->title }}",
                    date: "{{ $job->lastdate }}",
                })
            }
            myStorage.setItem('views', JSON.stringify(views));

            $('#bookmark-btn').click(function (e) {
                e.preventDefault();
                hasbookmark = !hasbookmark;
                $('#bookmark').html(hasbookmark?"Remove Bookmark":"Bookmark");
                if(hasbookmark){
                    bookmarks.push({{$job->id}})
                }else{
                    bookmarks = bookmarks.filter(element => element !== {{$job->id}});
                }
                myStorage.setItem('bookmarks',JSON.stringify(bookmarks));
                // cons
            });
        });
    </script>

@endsection
