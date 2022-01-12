<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{

    public function index()
    {
        return view('Need.vendor.index');
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


    ///Jobs

    public function jobs()
    {
        $jobs = JobProvider::join('job_categories', 'job_categories.id', '=', 'job_providers.job_category_id')
            ->where('user_id', Auth::user()->id)
            ->select(DB::raw('job_providers.id,job_providers.title,job_providers.updated_at,job_providers.lastdate,job_categories.name as category'))
            ->get();
        return view('Need.vendor.job.index', compact('jobs'));
    }

    public function jobView(JobProvider $job)
    {
        $cats = JobCategory::all(['id', 'name']);

        return view('Need.vendor.job.view', compact('job', 'cats'));
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
}
