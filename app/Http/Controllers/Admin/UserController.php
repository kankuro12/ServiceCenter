<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\JobProvider;
use App\Models\JobSeekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $fileArr=[
        "ase",
        "art",
        "bmp",
        "blp",
        "cd5",
        "cit",
        "cpt",
        "cr2",
        "cut",
        "dds",
        "dib",
        "djvu",
        "egt",
        "exif",
        "gif",
        "gpl",
        "grf",
        "icns",
        "ico",
        "iff",
        "jng",
        "jpeg",
        "jpg",
        "jfif",
        "jp2",
        "jps",
        "lbm",
        "max",
        "miff",
        "mng",
        "msp",
        "nitf",
        "ota",
        "pbm",
        "pc1",
        "pc2",
        "pc3",
        "pcf",
        "pcx",
        "pdn",
        "pgm",
        "PI1",
        "PI2",
        "PI3",
        "pict",
        "pct",
        "pnm",
        "pns",
        "ppm",
        "psb",
        "psd",
        "pdd",
        "psp",
        "px",
        "pxm",
        "pxr",
        "qfx",
        "raw",
        "rle",
        "sct",
        "sgi",
        "rgb",
        "int",
        "bw",
        "tga",
        "tiff",
        "tif",
        "vtf",
        "xbm",
        "xcf",
        "xpm",
        "3dv",
        "amf",
        "ai",
        "awg",
        "cgm",
        "cdr",
        "cmx",
        "dxf",
        "e2d",
        "egt",
        "eps",
        "fs",
        "gbr",
        "odg",
        "svg",
        "stl",
        "vrml",
        "x3d",
        "sxd",
        "v2d",
        "vnd",
        "wmf",
        "emf",
        "art",
        "xar",
        "png",
        "webp",
        "jxr",
        "hdp",
        "wdp",
        "cur",
        "ecw",
        "iff",
        "lbm",
        "liff",
        "nrrd",
        "pam",
        "pcx",
        "pgf",
        "sgi",
        "rgb",
        "rgba",
        "bw",
        "int",
        "inta",
        "sid",
        "ras",
        "sun",
        "tga"
    ];
    public function delivery($type){
        $delivery=Delivery::with('user')->orderBy('id','DESC')->where('status',$type)->paginate(50);
        return view('back.delivery.index',compact('delivery','type'));
    }

    public function deliveryComplete(Request $request){
        $delivery=Delivery::find($request->id);
        $delivery->status=1;
        $delivery->save();
        return response('ok');
    }
    public function deliverySingle(Delivery $delivery){
        $info=pathinfo($delivery->file);
        $ext=$info['extension'];
        $isimage=in_array($ext,$this->fileArr);
        return view('back.delivery.single',compact('delivery','isimage','info'));


    }

    public function jobseeker(){
        $jobseeker=JobSeekers::with('user')->orderBy('id','DESC')->paginate(50);
        return view('back.job.seeker.index',compact('jobseeker'));
    }
    public function jobseekerSingle(JobSeekers $jobseeker){
        $info=pathinfo($jobseeker->file);
        $ext=$info['extension'];
        $isimage=in_array($ext,$this->fileArr);
        return view('back.job.seeker.single',compact('jobseeker','isimage','info'));


    }


    public function job(){
        $jobs = JobProvider::join('job_categories', 'job_categories.id', '=', 'job_providers.job_category_id')
        ->join('users','users.id','=','job_providers.user_id')
        ->select(DB::raw('users.company,users.name,users.phone,job_providers.id,job_providers.title,job_providers.updated_at,job_providers.lastdate,job_providers.created_at,job_categories.name as category,(select count(*) from applied_jobs where job_provider_id=Job_providers.id) as applicants'))
        ->latest()
        ->paginate(50);
        return view('back.job.provider.index',compact('jobs'));
    }
    public function jobExport(JobProvider $job){
    }
    public function jobSingle(JobProvider $job){
        if($job->file!=null){

            $info=pathinfo($job->file);
            $ext=$info['extension'];
            $isimage=in_array($ext,$this->fileArr);
        }else{
            $info=[];
            $isimage=false;
        }
        return view('back.job.seeker.single',compact('job','isimage','info'));


    }
    public function message(){
        $msgs=\App\Models\ClientMessage::orderBy('id','DESC')->paginate(7);
        $links=$msgs->links();
        // dd($msgs,$links);
        return view('back.message.index',compact('msgs','links'));

    }
}
