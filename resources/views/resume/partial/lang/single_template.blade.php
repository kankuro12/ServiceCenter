<span id="single-lang-template" class="d-none">
    <hr>
    <div id="lang-single-xxx_id">
        <form action="{{route('resume.data-add')}}" id="edit-lang-xxx_id-form"   method="post" onsubmit="event.preventDefault();save(this)">
            @csrf
            <input type="hidden" name="type" value="skill">
                    <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="id" value="xxx_id">
                <input type="hidden" name="ptype" value="2">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                   <div class="col-md-4">
                       <label for="lang-name" req>Language</label>
                       <input type="text" name="name" id="lang-xxx_id-name" class="input" value="xxx_name">
                   </div>
                   <div class="col-md-4">
                       <label for="lang-level" class="level"  class="w-100">Proficiency </label>
                       <select name="level" id="lang-xxx_id-level" class="input">
                        <option value="1">Beginner</option>
                        <option value="2">Average</option>
                        <option value="3">Skilled</option>
                        <option value="4">Expert</option>
                        <option value="5">Native</option>
                       </select>
                   </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div>
                            <span class="btn btn-danger me-2" onclick="del('lang',xxx_id)" >
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
