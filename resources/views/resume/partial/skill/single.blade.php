<div id="skill-single-{{$skill->id}}">
    <hr>
    <form action="{{route('resume.data-add')}}" id="edit-skill-{{$skill->id}}-form"  method="post" onsubmit="event.preventDefault();save(this)">
        @csrf
        <input type="hidden" name="type" value="skill">
                <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="ptype" value="1">
                <input type="hidden" name="id" value="{{$skill->id}}">
        <input type="hidden" name="resume_id" value="{{$resume->id}}">
            <div class="row form" >
               <div class="col-md-4">
                   <label for="skill-name" req>Skill</label>
                   <input type="text" name="name" id="skill-{{$skill->id}}-name" value="{{$skill->name}}"  class="input">
               </div>
               <div class="col-md-4">
                   <label for="skill-level" class="level"  class="w-100">Proficiency </label>
                   <select name="level" id="skill-{{$skill->id}}-level" class="input">
                       <option value="1" {{$skill->level==1?'selected':''}}>Traniee</option>
                       <option value="2" {{$skill->level==2?'selected':''}}>Beginner</option>
                       <option value="3" {{$skill->level==3?'selected':''}}>Average</option>
                       <option value="4" {{$skill->level==4?'selected':''}}>Skilled</option>
                       <option value="5" {{$skill->level==5?'selected':''}}>Expert</option>
                   </select>
               </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div>
                        <span class="btn btn-danger me-2" onclick="del('skill',{{$skill->id}})" >
                            Delete
                        </span>
                        <button class="btn btn-success">
                            Save
                        </button>
                    </div>
                </div>


            </div>
    </form>
</div>
