<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                Documents
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-file" onclick="toogle(this,'t-file')" data-target="#add-file-form" data-alt="#list-file">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{route('resume.data-add')}}" id="add-file-form" class="d-none"  method="post" onsubmit="event.preventDefault();save(this,fileAdded)">
            @csrf
            <input type="hidden" name="type" value="file">
            <input type="hidden" name="ptype" value="2">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                    <div class="col-md-4">
                        <label for="file-name" req>Document Name</label>
                        <input type="text" name="name" id="file-name" class="input">
                    </div>
                    <div class="col-md-4">
                        <label for="file-file" req>File</label>
                        <input type="file" name="file" id="file-file" class="input" accept="image/*,.docx,.pdf">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <div>
                            <span class="btn btn-danger me-2 t-file d-none" onclick="toogle(this,'t-file')" data-target="#add-file-form" data-alt="#list-file">
                                cancel
                            </span>
                            <button class="btn btn-success">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
        </form>
        <div class="row" id="list-file">

            @foreach ($resume->files as $file)
                @include('resume.partial.file.single',['file'=>$file])
            @endforeach
        </div>
    </div>
</div>
@include('resume.partial.file.single_template')
<script>

    function fileAdded(data) {

            $('.t-file')[0].click();
            $('#add-file-form')[0].reset();
            $('#list-file').append(data.data);
    }
</script>
