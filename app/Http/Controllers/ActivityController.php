<?php

namespace App\Http\Controllers;
use App\Services\ActivityService;
use Session;
use App\Models\Activity;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService){

        $this->activityService = $activityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities= $this->activityService->getAllactivity();
        // dd($activities);
        return view('mainpages.activitylistpage')->with('activities', $activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('mainpages/addactivity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("stroe");
        $result = $this->activityService->saveActivity($request);
        return redirect('/mainpage/activity');
        // return redirect('mainpages/activitylistpage');
    }

    public function addconfirm(Request $data) {
        $activity = new Activity;
        // $activity = new $this->activity;
        $activity -> Title = $data->input('addactivity_title');
        $activity -> Description = $data->input('addactivity_description');        
        $activity -> Activities_Date = $data->input('addactivity_date');
        // handle the is_uploaded_file
        if($data->hasFile('addactivity_image')){

          $path =$data->file('addactivity_image')->storeAs("activityimages","activity_image_".$activity -> Title.".jpg",['disk'=>'public']);  
          $imgname = substr($path,strlen("activityimages/"));  
        }
        if ($data->hasFile('addactivity_image')) {
          $activity-> Images = $imgname;
        }
        // return view('mainpage.addactivityconfirm', compact('activity',$activity));
        return view('/mainpages/addactivityconfirm')->with('activity',$activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity= $this->activityService->getById($id);
        // dd($activitie);
        return view('mainpages.editactivitypage')->with('activity', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = $this->activityService->updateActivity($request);
        return redirect('/mainpage/activity');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateconfirm(Request $request)
    {
        $id=$request->input('id');
        $activity = Activity::find($id);
        $activity -> Title = $request->input('activity_title');
        $activity -> Description = $request->input('activity_description');        
        $activity -> Activities_Date = $request->input('activity_date'); 
        // $file = $request ->file('activity_image');
        // dd($file);
        // return view('/mainpages/editactivityconfirm')->with('activity',$activity, 'file' ,$file);
        return view('/mainpages/editactivityconfirm')->with('activity',$activity);

    }
    
}
