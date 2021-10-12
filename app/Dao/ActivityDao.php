<?php

namespace App\Dao;
use Illuminate\Http\Request;
use App\Models\Activity;
use DB;

class ActivityDao
{

    protected $activity;

    public function __construct(Activity $activity){
        $this->activity =$activity;
    }

    /**
     *get all activity
     */
    public function getAll()
    {
      
        $activities = Activity::all();
        return $activities;
    }

    /**
     *save absent activity attendance
     */
    public function saveActivity($data)
    {
       
        $activity = new $this->activity;
        $activity -> Title = $data->input('addactivity_title');
        // $activity -> save();
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
        // $activity->save();
    }

    // get activity by Id
    public function getById($id)
    {
        $activity = Activity::find($id);
        return $activity;
    }  


    // update activity  by Id
    public function updateActivity($data)
    {
      $id=$data->input('id');
      $activity = Activity::find($id);
      $activity -> Title = $data->input('activity_title');
      $activity -> Description = $data->input('activity_description');        
      $activity -> Activities_Date = $data->input('activity_date'); 
      $activity-> Images = $data->input('activity_image'); 
      // handle the is_uploaded_file
        //  if($data->hasFile('activity_image')){
        //   $path =$data->file('activity_image')->storeAs("activityimages","activity_image_".$activity -> Title.".jpg",['disk'=>'public']);  
        //   $imgname = substr($path,strlen("activityimages/"));  
        //  }
        //  if ($data->hasFile('activity_image')) {
        //   $activity-> Images = $imgname;
        // }
         try
         {
           $activity->save();
           $result = [
             'status'=> 200,
             'message'=> "Activity have been updated!"
           ];
         }catch(\Illuminate\Database\QueryException $ex)
         {
           $result = [
               'status'=> 500,
               'message'=> "Entry Failed!! 
               Activity NRC & Email must be unique!"
           ];
         }
       return $result;
    }   
    // delete activity by changing delete_flag
    public function delete($data)
    {
        $id=$data->input('id');
        $activity = Activity::find($id);
        $activity-> delete_flag = true;        
        $activity-> deleted_at = date('Y-m-d H:i:s');;
        $activity->save();

    }  

    public function confirmActivity($request)
    {
        $id=$request->input('id');
        $activity = Activity::find($id);
        $activity -> Title = $request->input('activity_title');
        $activity -> Description = $request->input('activity_description');        
        $activity -> Activities_Date = $request->input('activity_date'); 

         // handle the is_uploaded_file
         if($request->hasFile('activity_image')){
          $path =$request->file('activity_image')->storeAs("activityimages","activity_image_".$activity -> Title.".jpg",['disk'=>'public']);  
          $imgname = substr($path,strlen("activityimages/"));  
         }
         if ($request->hasFile('activity_image')) {
          $activity-> Images = $imgname;
        }
        return $activity;
    }

    
}