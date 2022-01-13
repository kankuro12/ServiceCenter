@extends('Need.vendor.dashboard.index')
@section('newcss')

@endsection
@section('newtitle', 'Add Job')
@section('jumbo')
<a href="{{route('n.front.vendor.posted-job.index')}}">
    Posted Jobs
</a>
<span>
    Add New
</span>
@endsection
@section('newcontent')
    <div class="bg-white shadow mb-4">
        <div class="card-body ">
            {{-- <div class="selector-title">
            <span>Add A Job</span>
        </div>
        <div class="line"></div> --}}
            <div>
                <form action="{{ route('n.front.vendor.posted-job.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="" class="mb-1">Job Title*</label>
                                <input type="text" name="title" id="title" placeholder="Enter Job Title"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="job_category_id" class="mb-1">Job Category*</label>
                                <select  name="job_category_id" id="job_category_id"
                                    class="form-control" required>
                                    @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="salary" class="mb-1">Salary*</label>
                                <input type="text" name="salary" id="salary" placeholder="Enter Salary"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="designation" class="mb-1">Designation*</label>
                                <input type="text" name="designation" id="designation" placeholder="Enter Designation"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="education" class="mb-1">Education*</label>
                                <input type="text" name="education" id="education" placeholder="Enter Education Required"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="exp" class="mb-1">Experience*</label>
                                <input type="text" name="exp" id="exp" placeholder="Enter Experience Required"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="opening" class="mb-1">Openings*</label>
                                <input type="number" name="opening" id="opening" placeholder="Enter Quotas"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="type" class="mb-1">Job Type*</label>
                                <select  name="type" id="type"
                                    class="form-control" required>
                                    <option value="1">Full Time</option>
                                    <option value="2">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="lastdate" class="mb-1">Apply Due Date*</label>
                                <input type="date" name="lastdate" id="lastdate" placeholder="Enter Lastdate"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 ">
                        <label for="" class="mb-1">Job Description*</label>
                        <textarea name="desc" id="desc"  class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Document</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".doc,.docx,.pdf,image/*">
                    </div>
                    <div class="form-group mb-2 py-2">
                        <button class="btn btn-primary">Submit Job</button>
                        <a href="{{route('n.front.vendor.posted-job.index')}}" class="btn btn-danger">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('includejs')
    <script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
@section('newjs')
    <script>
        $(function() {
            $('#concat-us-section').remove();
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
