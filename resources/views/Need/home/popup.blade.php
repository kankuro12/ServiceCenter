@if ($pop->status == 1)

    <div class="modal" id="popup" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button data-bs-dismiss="modal" class="btn b-white " style="height: 40px;width:40px;position: absolute;right:0px;top:0px;">
                    <i class="fa fa-close"></i>
                </button>
                <div class="row m-0">
                    <div class="col-md-6 text-center pt-5">
                        <div>

                            <img style="max-height: 60px;margin-bottom:20px;" src="{{asset(custom_config('logo')->value??'')}}" alt="">
                            <h5 class="my-2">{!! $pop->title !!}</h5>
                            <p class="pb-3 pb-md-0">{{ $pop->short_detail }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <img src="{{asset('front/images/info/'.$pop->image) }}" class="w-100" alt="newsletter">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endif
