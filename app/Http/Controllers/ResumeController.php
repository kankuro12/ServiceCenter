<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Exp;
use App\Models\Ref;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $resume=Resume::where('user_id',$user->id)->first();
        if($resume==null){
            $resume=new Resume();
            $resume->name=$user->name;
            $resume->email=$user->email;
            $resume->phone=$user->phone;
            $resume->addr=$user->address;
            $resume->address=$user->address;
            $resume->user_id=$user->id;
            $resume->save();
        }
        return view('resume.layout',compact('resume'));
    }

    public function save(Request $request){
        $user=Auth::user();
        $resume=Resume::where('user_id',$user->id)->first();
        if($resume==null){
            $resume=new Resume();
        }
        $resume->name=$request->name;
        $resume->email=$request->email;
        $resume->phone=$request->phone;
        $resume->addr=$request->addr;
        $resume->country=$request->country;
        $resume->city=$request->city;
        $resume->citizen=$request->citizen;
        $resume->dob=$request->dob;
        $resume->summary=$request->summary;
        $resume->mname=$request->mname;
        $resume->fname=$request->fname;
        $resume->save();
        return response()->json(['status'=>true,'msg'=>"Personel Detail Updated Sucessfully"]);
    }

    public function dataAdd(Request $request){
        $user=Auth::user();
        $resume=Resume::where('user_id',$user->id)->first();
        $message='';
        $data=[];
        // dd($request->type);
        if($request->type=='edu'){

            if($request->filled('editmode')){
                // dd($request->all());
                $edu=Education::where('id',$request->id)->first();

                // if($edu==null){
                //     $edu=new Education();
                //     $edu->resume_id=$resume->id;

                // }
            }else{
                $edu=new Education();
                $edu->resume_id=$resume->id;

            }
            $edu->school=$request->school;
            $edu->start=$request->start;
            $edu->end=$request->end;
            $edu->desc=$request->desc??'';
            $edu->degree=$request->degree;
            $edu->city=$request->city;
            $edu->grade=$request->grade;
            $edu->save();
            $edu->edited=$request->filled('editmode');
            $data=$edu;
            $message="Education Detail Updated Sucessfully";
        }else if($request->type=='exp'){
            if($request->filled('editmode')){
                $exp=Exp::where('id',$request->id)->first();
            }else{
                $exp=new Exp();
                $exp->resume_id=$resume->id;
            }
            $exp->company=$request->company;
            $exp->name=$request->name;
            $exp->start=$request->start;
            $exp->end=$request->end;
            $exp->desc=$request->desc??'';
            $exp->city=$request->city;
            $exp->save();
            $exp->edited=$request->filled('editmode');
            $data=$exp;
            $message="Experience Saved Sucessfully";
        }else if($request->type=='skill'){
            if($request->filled('editmode')){
                $skill=Skill::where('id',$request->id)->first();
            }else{
                $skill=new Skill();
                $skill->resume_id=$resume->id;
            }
            $skill->name=$request->name;
            $skill->level=$request->level;
            $skill->type=$request->ptype;
            $skill->save();
            $skill->edited=$request->filled('editmode');
            $data=$skill;
            $message=($skill->type==1?"Skill":"Lanuage")." Saved Sucessfully";
        } else if($request->type=='ref'){
            if($request->filled('editmode')){
                $ref=Ref::where('id',$request->id)->first();
            }else{
                $ref=new Ref();
                $ref->resume_id=$resume->id;
            }
            $ref->company=$request->company;
            $ref->name=$request->name;
            $ref->email=$request->email;
            $ref->phone=$request->phone;
            $ref->save();
            $ref->edited=$request->filled('editmode');
            $data=$ref;
            $message="Reference Saved Sucessfully";
        }

        return response()->json(['status'=>true,'msg'=>$message,'data'=>$data]);

    }

    public function dataDel(Request $request){
        $message='';
        if($request->type=='edu'){
            $edu=Education::where('id',$request->id)->first();
            $edu->delete();
            $message='Education Deleted Sucessfully';
        }else if($request->type=='exp'){
            $edu=Exp::where('id',$request->id)->first();
            $edu->delete();
            $message='Experience Deleted Sucessfully';
        }else if($request->type=='skill'){
            $edu=Skill::where('id',$request->id)->first();
            $edu->delete();
            $message='Skill Deleted Sucessfully';
        }else if($request->type=='ref'){
            $edu=Ref::where('id',$request->id)->first();
            $edu->delete();
            $message='Reference Deleted Sucessfully';
        }
        return response()->json(['status'=>true,'msg'=>$message]);


    }
}
