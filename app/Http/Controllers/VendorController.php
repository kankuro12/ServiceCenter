<?php

namespace App\Http\Controllers;

use App\Models\AppliedJob;
use App\Models\Delivery;
use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\ServiceOrder;
use App\Models\User;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VendorController extends Controller
{
    private function isActive()
    {
        $user = Auth::user();

        if($user->role==3){
            $active=true;
        }else{

            if($user->till==null){
                $active=false;
            }else{

                $result = Carbon::now()->lte($user->till);
                $active=$user->active && $result;
            }
        }
        return $active ;
    }

    public function index()
    {
        $user = Auth::user();
        $orders=ServiceOrder::where('user_id',$user->id)->get();
        $deliveries=Delivery::where('user_id',$user->id)->get();
        $active=$this->isActive();
        return view('Need.vendor.index',compact('orders','deliveries','active'));
    }
    public function changeImage(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $user->image = $request->image->store('uploads/user');
            $user->save();
        }
        return response()->json(['status' => true]);
    }
    public function changeName(Request $request)
    {
        $user = Auth::user();
        if ($request->filled('name')) {
            $user->name = $request->name;
            $user->save();
        }
        return response()->json(['status' => true]);
    }
    public function changeDesc(Request $request)
    {
        $user = Auth::user();
        if ($request->filled('desc')) {
            $user->desc = $request->desc;
            $user->save();
        }
        return response()->json(['status' => true]);
    }

    public function appliedJobs()
    {
        $user = Auth::user();
        $applied_jobs=DB::table('applied_jobs')->join('job_providers','job_providers.id','=','applied_jobs.job_provider_id')
        ->join('users','users.id','=','job_providers.user_id')
        ->select(DB::raw('job_providers.title,DATE_FORMAT(job_providers.lastdate,\'%e, %M %Y\') as duedate,DATE_FORMAT(job_providers.created_at,\'%e, %M %Y\')   as posted,DATE_FORMAT(applied_jobs.created_at,\'%e, %M %Y\')  as applied,users.company,applied_jobs.job_provider_id'))
        ->orderBy('applied_jobs.id','desc')
        ->get();
        // dd($applied_jobs);
        return view('Need.vendor.job.applied',compact('applied_jobs'));
    }

    public function manageProfile(Request $request)
    {
        $user = Auth::user();

        if($request->getMethod()=="POST"){
            if($user->email!=$request->email){
                if(User::where('email',$request->email)->where('id',$user->id)->count()>0){
                    throw new \Exception('Email Already In Use');
                }
                $user->email=$request->email;
            }
            if($user->phone!=$request->phone){
                if(User::where('phone',$request->phone)->where('id',$user->id)->count()>0){
                    throw new \Exception('Phone Already In Use');
                }
                $user->phone=$request->phone;

            }

            $user->name=$request->name;
            $user->desc=$request->desc;
            $user->company=$request->company;
            $user->save();


        }else{
            return view('Need.vendor.profile',compact('user'));

        }
    }

    ///Jobs

    public function jobs()
    {
        $active=$this->isActive();
        if($active){

            $jobs = JobProvider::join('job_categories', 'job_categories.id', '=', 'job_providers.job_category_id')
                ->where('user_id', Auth::user()->id)
                ->select(DB::raw('job_providers.id,job_providers.title,job_providers.updated_at,job_providers.lastdate,job_categories.name as category,(select count(*) from applied_jobs where job_provider_id=Job_providers.id) as applicants'))
                ->get();
            return view('Need.vendor.job.index', compact('jobs'));
        }else{
            return view('Need.vendor.job.notactive');
        }
    }

    public function jobView(JobProvider $job)
    {
        $cats = JobCategory::all(['id', 'name']);

        return view('Need.vendor.job.view', compact('job', 'cats'));
    }

    public function jobExport(JobProvider $job)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', "Name");
        $sheet->setCellValue('B1', "Email");
        $sheet->setCellValue('C1', "Phone");
        $sheet->setCellValue('D1', "Address");
        $sheet->setCellValue('E1', "Description");
        $sheet->setCellValue('F1', "Applied Date");
        $sheet->setCellValue('G1', "Resume Link");
        $i=2;
        $wizard = new \PhpOffice\PhpSpreadsheet\Helper\Html();
        foreach ($job->applicants as $applicant){
            $sheet->setCellValue('A'.$i, $applicant->name);
            $sheet->setCellValue('B'.$i, $applicant->email);
            $sheet->setCellValue('C'.$i, $applicant->phone);
            $sheet->setCellValue('D'.$i, $applicant->address);
            $sheet->setCellValue('E'.$i,'');
            $sheet->setCellValue('F'.$i, $applicant->created_at->format('d, m Y'));
            $sheet->setCellValue('G'.$i,'View Resume');
            $sheet->getCell('G'.$i)->getHyperlink()->setUrl(route('resume.view',['user'=>$applicant->user_id]));
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        $file='uploads/export/'.$job->id.(str_replace(' ','_',$job->title)).'.xlsx';
        $writer->save($file);
        return response(asset($file));
    }
    public function addJob(Request $request)
    {

        if ($request->getMethod() == "POST") {
            $job = new JobProvider();
            $job->user_id = Auth::user()->id;
            $job->title = $request->title;
            $job->desc = $request->desc;
            $job->job_category_id = $request->job_category_id;
            $job->type = $request->type;
            $job->opening = $request->opening;
            $job->salary = $request->salary;
            $job->designation = $request->designation;
            $job->education = $request->education;
            $job->exp = $request->exp;
            $job->lastdate = $request->lastdate;
            $job->positiontype = $request->positiontype ?? 1;
            if ($request->hasFile('file')) {
                $job->file = $request->file->store('uploads/job/provider');
            }
            $job->save();
            return redirect()->route('n.front.vendor.posted-job.view', ['job' => $job->id]);
            // dd($job);
            // return response()->json(['status'])

        } else {
            $cats = JobCategory::all(['id', 'name']);
            return view('Need.vendor.job.add', compact('cats'));
        }
    }
    public function jobUpdate(Request $request, JobProvider $job)
    {
        $job->title = $request->title;
        $job->desc = $request->desc;
        $job->job_category_id = $request->job_category_id;
        $job->type = $request->type;
        $job->opening = $request->opening;
        $job->salary = $request->salary;
        $job->designation = $request->designation;
        $job->education = $request->education;
        $job->exp = $request->exp;
        $job->lastdate = $request->lastdate;
        $job->positiontype = $request->positiontype ?? 1;
        $job->save();
        // return redirect()->route('n.front.vendor.posted-job.view',['job'=>$job->id]);
        // // dd($job);
        return response()->json(['status'=>true]);
    }

    public function deliveries(){
        $user = Auth::user();
        $deliveries=Delivery::where('user_id',$user->id)->get();
        return view('Need.vendor.delivery.index',compact('deliveries'));
    }

    public function orders(){
        $user = Auth::user();
        $orders=ServiceOrder::where('user_id',$user->id)->latest()->get();
        return view('Need.vendor.order.index',compact('orders'));
    }
    public function singleOrder(ServiceOrder $order){
        // $user = Auth::user();
        // $orders=ServiceOrder::where('user_id',$user->id)->get();
        // return view('Need.vendor.order.index',compact('orders'));
        dd($order->getProductImages());
    }
}
