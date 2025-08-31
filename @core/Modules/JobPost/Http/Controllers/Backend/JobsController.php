<?php

namespace Modules\JobPost\Http\Controllers\Backend;

use App\Helpers\FlashMsg;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\JobPost\Entities\BuyerJob;
use Modules\JobPost\Entities\JobRequest;
use Modules\JobPost\Entities\JobRequestConversation;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:job-list|job-status|job-delete',['only' => ['jobs']]);
        $this->middleware('permission:job-status',['only' => ['change_status']]);
        $this->middleware('permission:job-delete',['only' => ['delete']]);
    }

    public function jobs()
    {
        $current_date = date('Y-m-d h:i:s');
        $all_jobs = BuyerJob::orderByDesc('id')->get();
        return view('jobpost::backend.jobs',compact('all_jobs'));
    }

    public function change_status($id)
    {
        $job = BuyerJob::find($id);
        $job->status === 1 ? $status = 0 : $status = 1;
        BuyerJob::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(FlashMsg::item_new('Status Changed Success'));
    }

    public function delete($id){
        BuyerJob::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new('Job Deleted Success'));
    }

    public function all_request($id)
    {
        $all_request = JobRequest::with('job')->where('job_post_id',$id)->orderByDesc('id')->get();
        return view('jobpost::backend.all-request',compact('all_request'));
    }

    public function conversation_details($id)
    {
        $request_details = JobRequest::with('job')
            ->where('id',$id)
            ->first();
        $all_messages = JobRequestConversation::where(['job_request_id'=>$id])->get();
        $q = $request->q ?? '';
        return view('jobpost::backend.view-conversation', compact('request_details','all_messages','q'));
    }

    public function jobSettings()
    {
        return view('jobpost::backend.job-settings');
    }
    public function jobCreateSettingsUpdate(Request $request)
    {
        update_static_option('job_create_settings',$request->job_create_settings);
        update_static_option('job_overview_title',$request->job_overview_title);
        update_static_option('job_starting_at_price_title',$request->job_starting_at_price_title);
        return redirect()->back()->with(FlashMsg::item_new('Update Success'));

    }

}
