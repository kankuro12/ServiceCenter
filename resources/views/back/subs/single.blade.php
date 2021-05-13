<div class="m-3 p-3 shadow">

    <form action="{{route('admin.subs.update')}}" method="post" id="edit_{{$sub->id}}">
        <div class="row">
            @csrf
            <input type="hidden" name="id" value="{{$sub->id}}">
            <div class="col-md-6">
                <label for="">Package Name</label>
                <input type="text" required class="form-control" name="title" value="{{$sub->title}}">
            </div>
            <div class="col-md-6">
                <label for="">Package Price</label>
                <input type="number" step="0.01" min="0" required class="form-control" name="price" value="{{$sub->price}}">
            </div>
            <div class="col-md-12">
                <label for="">Package Description</label>
                <textarea type="text" required class="form-control" name="desc" required>{{$sub->desc}}</textarea>
            </div>
            <div class="p-3 "><button class="btn btn-success px-5 mr-3">Update</button><a href="{{route('admin.subs.del',['sub'=>$sub->id])}}" class="btn btn-danger px-5">Delete</a></div>
        </div>
    </form>
</div>