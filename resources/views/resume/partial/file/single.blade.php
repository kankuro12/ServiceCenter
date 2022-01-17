@php
    $img=isImage($file->file);
@endphp
<div class="col-md-4 row " id="file-single-{{$file->id}}">
    <div class="col-9">
        {{$file->name}}
        <div class="d-flex justify-content-between ">
            <a target="_blank" class="badge bg-success badge-sm" href="{{asset($file->file)}}">
                View Detail
            </a>
            <span class="badge bg-danger" onclick="del('file',{{$file->id}})">
                Delete
            </span>
        </div>
    </div>
    @if ($img)
    <div class="col-3">
        <a target="_blank" class="d-block w-100" href="{{asset($file->file)}}">
            @if (isImage($file->file))
                <img class="w-100" src="{{asset($file->file)}}" alt="">
            @endif
        </a>

    </div>
    @else
    <div class="col-2"></div>
    @endif

</div>
