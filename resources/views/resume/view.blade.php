<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume - {{ $resume->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'poppins';
            font-size: 13px;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .d-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            width: 33%;
        }

        .col-md-3 {
            width: 25%;
        }

        .col-md-6 {
            width: 50%;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .fw-500 {
            font-weight: 500;
        }

        .fw-600 {
            font-weight: 600;
        }

        .fw-700 {
            font-weight: 700;
        }

        .detail-section {
            width: 33%;
            display: flex;
            justify-content: space-between;
            /* padding: 5px; */
            /* font-size: 12px; */
        }

        .detail-section>span {
            padding: 0 5px;
        }

        .detail-section>span:first-child {
            font-weight: 600;
        }

        .fb>span:first-child {
            font-weight: 600;
            padding-right: 5px;
        }

        .fb>span:first-child::after {
            content: ":";
            /* padding-right: 5px; */
        }

        .summary {
            text-align: justify;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

    </style>
</head>

<body>
    <div style="padding: 10px;text-align:center;">
        <img src="{{ asset($user->image) }}" style="width: 100px;" alt="">
    </div>
    <h5 style="font-weight: 600;font-size: 1.4rem;margin:0px;text-align:center;">
        {{ $resume->name }}
    </h5>
    <div style="text-align: center;">

        {{ $resume->city }} , {{ $resume->country }} | {{ $resume->phone }}
    </div>
    <hr>
    <div class="d-flex">
        <div class="detail-section">
            <span>Address</span><span>{{ $resume->addr }}</span>
        </div>
        <div class="detail-section">
            <span>Phone</span><span>{{ $resume->phone }}</span>
        </div>
        <div class="detail-section">
            <span>Email</span><span>{{ $resume->email }}</span>
        </div>
        <div class="detail-section">
            <span>Date of Birth</span><span>{{ $resume->dob }}</span>
        </div>
        <div class="detail-section">
            <span>Citizenship</span><span>{{ $resume->citizen }}</span>
        </div>
        <div class="detail-section">
            <span>Country</span><span>{{ $resume->country }}</span>
        </div>
    </div>
    @if ($resume->summary != null && $resume->summary != '')
        <hr>
        <div class="summary ">
            {!! $resume->summary !!}
        </div>
    @endif
    <div class="education">
        <hr>
        <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:center;">
            Education
        </h5>
        @foreach ($resume->edus as $edu)
            {{-- <div class="d-flex"> --}}
            <div class="text-center">
                <span class="fw-600">{{ $edu->school }}. {{ $edu->city }}</span>
            </div>
            <div class=" d-flex">

                <div class="col-md-4 fb">
                    <span>Programme</span><span class="">{{ $edu->degree }}</span>
                </div>
                <div class="col-md-4 fb text-center">
                    <span>
                        Duration
                    </span>
                    <span>
                        <span class="">{{ $edu->start }}</span> -
                        <span class="">{{ $edu->end }}</span>
                    </span>
                </div>
                <div class="col-md-4 fb text-right">
                    <span>Grade / Division</span>
                    <span class="">{{ $edu->grade }}</span>
                </div>

            </div>

    </div>
    @if ($edu->desc != null && $edu->desc != '')
        <div class="summary">
            {!! $edu->desc !!}
        </div>
    @endif
    <hr>
    @endforeach
    </div>
    <div class="education">
        <hr>
        <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:center;">
            Work Experience
        </h5>
        @foreach ($resume->exps as $exp)
            {{-- <div class="d-flex"> --}}
            <div class="text-center">
                <span class="fw-600">{{ $exp->company }}, {{ $exp->city }}</span>
            </div>
            <div class=" d-flex">

                <div class="col-md-6 fb">
                    <span>Designation</span><span class="">{{ $exp->name }}</span>
                </div>
                <div class="col-md-6 fb text-right">
                    <span>
                        Duration
                    </span>
                    <span>
                        <span class="">{{ $exp->start }}</span> -
                        <span class="">{{ $exp->end }}</span>
                    </span>
                </div>


            </div>

    </div>
    @if ($exp->desc != null && $exp->desc != '')
        <div class="summary">
            {!! $exp->desc !!}
        </div>
    @endif
    <hr>
    @endforeach
    </div>
    <div class="d-flex">
        <div class="col-md-6">
            <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:left;">
                Skills
            </h5>
            <ul>
                @foreach ($resume->skills->where('type', 1) as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:left;">
                Language
            </h5>
            <ul>
                @foreach ($resume->skills->where('type', 2) as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <div>
        <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:left;">
            References
        </h5>
        <ul>

            @foreach ($resume->refs as $ref)
                <li>
                    <div class="d-flex">
                        <div class="col-md-4 fw-600">
                            {{ $ref->name }}
                        </div>
                        <div class="col-md-4">
                            {{ $ref->company }}
                        </div>
                        <div class="col-md-3">
                            {{ $ref->email }}, {{ $ref->phone }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="no-print">
        <hr>
        <h5 style="font-weight: 600;font-size: 1.1rem;margin:0px;text-align:left;">
            Attached Files
        </h5>
        <ol>
            @foreach ($resume->files as $file)
                <li>
                    <a href="{{asset($file->file)}}" target="_blank">{{$file->name}}</a>
                </li>
            @endforeach
        </ol>

    </div>
    {{-- <script>
        window.onload = function() { window.print(); }
    </script> --}}
</body>

</html>
