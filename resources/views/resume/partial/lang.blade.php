<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                Languages
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-lang" onclick="toogle(this,'t-lang')" data-target="#add-lang-form" data-alt="#list-lang">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{route('resume.data-add')}}" id="add-lang-form" class="d-none"  method="post" onsubmit="event.preventDefault();save(this,langAdded)">
            @csrf
            <input type="hidden" name="type" value="skill">
            <input type="hidden" name="ptype" value="2">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                   <div class="col-md-4">
                       <label for="lang-name" req>Language</label>
                       <input type="text" name="name" id="lang-name" class="input">
                   </div>
                   <div class="col-md-4">
                       <label for="lang-level" class="level"  class="w-100">Proficiency </label>
                       <select name="level" id="lang-level" class="input">
                           <option value="1">Beginner</option>
                           <option value="2">Average</option>
                           <option value="3">Skilled</option>
                           <option value="4">Expert</option>
                           <option value="5">Native</option>
                       </select>
                   </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div>
                            <span class="btn btn-danger me-2 t-lang d-none" onclick="toogle(this,'t-lang')" data-target="#add-lang-form" data-alt="#list-lang">
                                cancel
                            </span>
                            <button class="btn btn-success">
                                Save
                            </button>
                        </div>
                    </div>


                </div>
        </form>
        <div id="list-lang">
            @foreach ($resume->skills->where('type',2) as $lang)
                @include('resume.partial.lang.single',['lang'=>$lang])
            @endforeach
        </div>
    </div>
</div>
@include('resume.partial.lang.single_template')
<script>

    function langAdded(data) {
        html=$('#single-lang-template').html();
            for (const key in data.data) {
                if (Object.hasOwnProperty.call(data.data, key)) {
                    const element = data.data[key];
                    html=html.replaceAll('xxx_'+key,element);
                }
            }

            $('.t-lang')[0].click();
            $('#add-lang-form')[0].reset();
            $('#list-lang').append(html);
        $('#lang-'+data.data.id+'-level').val(data.data.level);
    }
</script>
