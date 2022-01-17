<div class="row m-0">
    @foreach ($deliveries as $delivery)
        <div class="col-md-4 col-6 p-0 pb-2">
            <div class=" bg-white shadow mb-3 h-100" style="break-inside: avoid-column;">
                <div class="delivery-image">

                        <img src="{{ asset($delivery->file) }}" alt="" class="w-100">

                </div>
                <div class="card-body d-md-flex d-none justify-content-between align-items-center">
                    <span class="">
                        <strong class="d-none d-md-inline">status</strong>
                        <span class="badge  {{ $delivery->status == 0 ? 'bg-warning' : 'bg-success' }}">
                            {{ $delivery->status == 0 ? 'Pending' : 'Completed' }}
                        </span>
                    </span>
                    <a href="{{route('admin.deliverySingle',['delivery'=>$delivery->id])}}"  class="btn btn-sm btn-primary " target="_blank">
                        Detail
                    </a>
                </div>
                <div class="p-2 d-md-none d-block justify-content-between align-items-center">
                    <div class="text-center py-2">
                        <span class="badge  {{ $delivery->status == 0 ? 'bg-warning' : 'bg-success' }}">
                            {{ $delivery->status == 0 ? 'Pending' : 'Completed' }}
                        </span>
                    </div>
                    <a href="{{route('admin.deliverySingle',['delivery'=>$delivery->id])}}"  class="btn btn-sm btn-primary w-100" target="_blank">
                        Detail
                    </a>
                </div>

            </div>
        </div>
    @endforeach
</div>

