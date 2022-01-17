<div class="bg-white shadow d-none d-md-block">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>#REF ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Posted</th>
                <th>Applicants</th>
                <th>Due Date</th>
                <th></th>
            </tr>
            @foreach ($jobs as $job)
                <tr>
                    <th>
                        {{$job->id}}
                    </th>
                    <td>{{$job->title}}</td>
                    <td>{{$job->category}}</td>
                    <td>{{$job->updated_at->format('d-m-Y')}}</td>
                    <td>{{$job->applicants}}</td>
                    <td>{{$job->lastdate?->format('d-m-Y')}}</td>
                    <td>
                        <a target="_blank" href="{{route('admin.job-Single',['job'=>$job->id])}}" class="btn btn-sm btn-link">View</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
