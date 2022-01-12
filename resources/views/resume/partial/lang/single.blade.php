<div id="lang-single-{{$lang->id}}">
    <hr>
    <form action="{{route('resume.data-add')}}" id="edit-lang-{{$lang->id}}-form"  method="post" onsubmit="event.preventDefault();save(this)">
        @csrf
        <input type="hidden" name="type" value="skill">
                <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="ptype" value="1">
                <input type="hidden" name="id" value="{{$lang->id}}">
        <input type="hidden" name="resume_id" value="{{$resume->id}}">
            <div class="row form" >
               <div class="col-md-4">
                   <label for="lang-name" req>Language</label>
                   <input type="text" name="name" id="lang-{{$lang->id}}-name" value="{{$lang->name}}"  class="input">
               </div>
               <div class="col-md-4">
                   <label for="lang-level" class="level"  class="w-100">Proficiency </label>
                   <select name="level" id="lang-{{$lang->id}}-level" class="input">
                       <option value="1" {{$lang->level==1?'selected':''}}>Beginner</option>
                       <option value="2" {{$lang->level==2?'selected':''}}>Average</option>
                       <option value="3" {{$lang->level==3?'selected':''}}>langed</option>
                       <option value="4" {{$lang->level==4?'selected':''}}>Expert</option>
                       <option value="5" {{$lang->level==5?'selected':''}}>Native</option>
                   </select>
               </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div>
                        <span class="btn btn-danger me-2" onclick="del('lang',{{$lang->id}})" >
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
