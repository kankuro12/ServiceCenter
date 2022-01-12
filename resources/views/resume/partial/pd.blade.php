<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">
        <div class="title mb-2 ">

                Personal Details

        </div>
        <form action="{{route('resume.save')}}" method="post" onsubmit="event.preventDefault();save(this)">
            @csrf
                <div class="row form" >
                    <div class="col-md-4">
                        <label for="name" req>Name</label>
                        <input type="text" name="name" id="pd-name" class="input" required value="{{$resume->name}}">
                    </div>
                    <div class="col-md-4">
                        <label for="phone" req>Phone</label>
                        <input type="text" name="phone" id="pd-phone" class="input" required  value="{{$resume->phone}}">
                    </div>
                    <div class="col-md-4">
                        <label for="email" req>Email</label>
                        <input type="email" name="email" id="pd-email" class="input" required  value="{{$resume->email}}">
                    </div>
                    <div class="col-md-4">
                        <label for="country" req>Country</label>
                        <input type="text" list="data-country" name="country" id="pd-country" class="input"  required  value="{{$resume->country}}">
                    </div>
                    <div class="col-md-4">
                        <label for="city" req>City</label>
                        <input type="text" list="data-city" name="city" id="pd-city" class="input" required  value="{{$resume->city}}">
                    </div>
                    <div class="col-md-4">
                        <label for="addr" req>Street Address</label>
                        <input type="text" name="addr" id="pd-addr" class="input" required  value="{{$resume->addr}}">
                    </div>
                    <div class="col-md-2 col-6">
                        <label for="citizen" req>citizenship</label>
                        <input type="text" name="citizen" id="pd-citizen" class="input" required  value="{{$resume->citizen}}">
                    </div>
                    <div class="col-md-2 col-6">
                        <label for="dob" >Date Of Birth</label>
                        <input type="date" name="dob" id="pd-dob" class="input"   value="{{$resume->dob}}">
                    </div>
                    <div class="col-md-4">
                        <label for="fname" >Father's Name</label>
                        <input type="text" name="fname" id="pd-fname" class="input"   value="{{$resume->fname}}">
                    </div>
                    <div class="col-md-4">
                        <label for="mname" >Mother's Name</label>
                        <input type="text" name="mname" id="pd-mname" class="input"   value="{{$resume->mname}}">
                    </div>

                    <div class="col-md-12">
                        <label for="summary">Summary</label>
                        <textarea name="summary" id="pd-summary"  rows="5" class="input">{{$resume->summary}}</textarea>
                    </div>

                    <div class="py-2 text-end">
                        <button class="btn btn-primary">
                            Update
                        </button>
                    </div>


                </div>
        </form>
    </div>
</div>
