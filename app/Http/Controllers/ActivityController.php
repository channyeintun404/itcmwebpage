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
        $result = $this->activityService->saveActivity($request);
        return redirect('/mainpage/activity')->with('success','New Activity have been created!!');;
        // return redirect('mainpages/activitylistpage');
    }

    public function addconfirm(Request $data) {
        $activity = new Activity;

        
        $rules = [
            'addactivity_title' => 'required|max:30',
            'addactivity_description' => 'required|max:250',
        ];
    
    
        $this->validate($data, $rules);
        // $activity = new $this->activity;
        $activity -> Title = $data->input('addactivity_title');
        $activity -> Description = $data->input('addactivity_description');        
        $activity -> Activities_Date = $data->input('addactivity_date');
        // handle the is_uploaded_file
        if($data->hasFile('addactivity_image')){

          $path =$data->file('addactivity_image')->storeAs("image/activities","activity_image_".$activity -> Title.date('s').".jpg",['disk'=>'public']);  
          $imgname = substr($path,strlen("image/activities/"));  
        }
        if ($data->hasFile('addactivity_image')) {
          $activity-> Images = $imgname;
        }
        // $activity->save();
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
        
        $activity= $this->activityService->getById($id);
        // $activity->Title = Str::limit($activity->Title, 50);
        // $activity->Description = Str::limit($activity->Description, 250);
        return view('mainpages.showactivitypage')->with('activity', $activity);
  
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
        return redirect('/mainpage/activity')->with('success','Activity have been updated!!');;
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->activityService->delete($request);
        return redirect('/mainpage/activity')->with('success','Activity have been deleted!!');
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
        $rules = [
            'activity_title' => 'required|max:30',
            'activity_description' => 'required|max:250',
        ];
        $this->validate($request, $rules);
        $activity = $this->activityService->confirmActivity($request);
        return view('/mainpages/editactivityconfirm')->with('activity',$activity);

    }

    public function deleteall(Request $request){
        // dd("stroe");
        $result = $this->activityService->deleteallActivity($request);
       return redirect('/mainpage/activity')->with('success','Activity have been deleted!!');;
       // return back()->with('success','Activity deleted successfully');
       
   
       }
      
    
}
