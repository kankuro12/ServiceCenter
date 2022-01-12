<span id="single-skill-template" class="d-none">
    <hr>
    <div id="skill-single-xxx_id">
        <form action="{{route('resume.data-add')}}" id="edit-skill-xxx_id-form"   method="post" onsubmit="event.preventDefault();save(this)">
            @csrf
            <input type="hidden" name="type" value="skill">
                    <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="id" value="xxx_id">
                <input type="hidden" name="ptype" value="1">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                   <div class="col-md-4">
                       <label for="skill-name" req>Skill</label>
                       <input type="text" name="name" id="skill-xxx_id-name" class="input" value="xxx_name">
                   </div>
                   <div class="col-md-4">
                       <label for="skill-level" class="level"  class="w-100">Proficiency </label>
                       <select name="level" id="skill-xxx_id-level" class="input">
                           <option value="1" >Traniee</option>
                           <option value="2" >Beginner</option>
                           <option value="3" >Average</option>
                           <option value="4" >Skilled</option>
                           <option value="5" >Expert</option>
                       </select>
                   </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div>
                            <span class="btn btn-danger me-2" onclick="del('skill',xxx_id)" >
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

</span>
