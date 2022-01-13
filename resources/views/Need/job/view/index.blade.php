@extends('Need.layout')
@section('content')
<div class="big_section">

    <div class="container">
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <h4 class="job-title">
                            {{$job->title}}
                        </h4>
                        <hr class="my-1">
                        <div class="d-flex justify-content-between job-dates" >
                            <span>
                                Job Posted on {{$job->created_at->format('d, M Y')}}
                            </span>
                            <span>
                                Apply Before {{$job->lastdate->format('d, M Y')}}
                            </span>
                        </div>
                        <div class="company">
                            {{$job->user->company}}
                        </div>
                        <hr class="my-1">
                        <div class="company-desc mb-4">
                            {{$job->user->desc}}
                        </div>
                        <h4>
                            Job Details
                        </h4>
                        <hr class="my-1">
                        <table class="w-100">
                            <tr>
                                <th class="w-25">Designation</th>
                                <td>{{$job->designation}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Cateory</th>
                                <td>{{$job->category->name}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Salary</th>
                                <td>{{$job->salary}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Openings</th>
                                <td>{{$job->opening}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Position Type</th>
                                <td>{{$job->type==1?"Full Time":"Part Time"}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Education</th>
                                <td>{{$job->education}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Experience</th>
                                <td>{{$job->exp}}</td>
                            </tr>
                        </table>
                        <hr class="my-2">
                        <div>
                            {!! $job->desc !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="" class="btn btn-warning text-white w-100 mb-2">
                            BookMark <i class="fa fa-bookmark"></i>
                        </a>
                        <a href="" class="btn btn-success text-white w-100 mb-2">
                            ApplyNow <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
    </div>
</div>

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
<style>
    .big_section{
        color:#4d4d4d;
    }
    .job-title{
        color:#FE3F40;
    }
    .job-dates{
        font-size: 0.9rem;
        margin-bottom: 20px;
    }
    .company{
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 5px;

    }
    .company-desc{
        font-size: 0.9rem;
    }
</style>
@endsection
@section('js')


@endsection
