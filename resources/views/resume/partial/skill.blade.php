<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                Skills
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-skill" onclick="toogle(this,'t-skill')" data-target="#add-skill-form" data-alt="#list-skill">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{route('resume.data-add')}}" id="add-skill-form" class="d-none"  method="post" onsubmit="event.preventDefault();save(this,skillAdded)">
            @csrf
            <input type="hidden" name="type" value="skill">
            <input type="hidden" name="ptype" value="1">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                   <div class="col-md-4">
                       <label for="skill-name" req>Skill</label>
                       <input type="text" name="name" id="skill-name" class="input">
                   </div>
                   <div class="col-md-4">
                       <label for="skill-level" class="level"  class="w-100">Proficiency </label>
                       <select name="level" id="skill-level" class="input">
                           <option value="1">Traniee</option>
                           <option value="2">Beginner</option>
                           <option value="3">Average</option>
                           <option value="4">Skilled</option>
                           <option value="5">Expert</option>
                       </select>
                   </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div>
                            <span class="btn btn-danger me-2 t-skill d-none" onclick="toogle(this,'t-skill')" data-target="#add-skill-form" data-alt="#list-skill">
                                cancel
                            </span>
                            <button class="btn btn-success">
                                Save
                            </button>
                        </div>
                    </div>


                </div>
        </form>
        <div id="list-skill">
            @foreach ($resume->skills->where('type',1) as $skill)
                @include('resume.partial.skill.single',['skill'=>$skill])
            @endforeach
        </div>
    </div>
</div>
@include('resume.partial.skill.single_template')
<script>

    function skillAdded(data) {
        html=$('#single-skill-template').html();
            for (const key in data.data) {
                if (Object.hasOwnProperty.call(data.data, key)) {
                    const element = data.data[key];
                    html=html.replaceAll('xxx_'+key,element);
                }
            }

            $('.t-skill')[0].click();
            $('#add-skill-form')[0].reset();
            $('#list-skill').append(html);
        $('#skill-'+data.data.id+'-level').val(data.data.level);
    }
</script>
