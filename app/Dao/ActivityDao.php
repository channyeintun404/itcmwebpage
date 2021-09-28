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
        $activity -> emp_name = $data->input('emp_name');
        $activity -> emp_no = $data->input('emp_no');        
        $activity -> emp_phno = $data->input('emp_phno');        
        $activity -> emp_address = $data->input('emp_address');
        $activity -> emp_position = $data->input('emp_position');
        $activity -> password = $data->input('password');
        $activity -> emp_email = $data->input('emp_email');        
        $activity -> emp_joindate = $data->input('emp_joindate');        
        $activity -> dateofbirth = $data->input('dateofbirth');
        $activity -> emp_nrc = $data->input('emp_nrc');
        $activity -> gender = $data->input('gender');        
        $activity -> delete_flag = false;
        $activity -> status = false;
        
        // handle the is_uploaded_file
        if($data->hasFile('emp_img')){
          $path =$data->file('emp_img')->storeAs("activityprofile","emp_image_".$activity -> emp_name.".jpg",['disk'=>'public']);  
          $imgname = substr($path,strlen("activityprofile/"));            
          }
          if ($data->hasFile('emp_img')) {
            $activity-> emp_img = $imgname;
          }
          $result = ['status'=>200];
          try
          {
            $activity->save();
            $result = [
              'status'=> 200,
              'message'=> "New Activity have been created!"
            ];
          }catch(\Illuminate\Database\QueryException $ex)
          {
            $result = [
                'status'=> 500,
                'message'=> "Entry Failed!! 
                EmpNo,NRC and Email must be unique!!!"
            ];
          }
        return $result;
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
      $activity -> emp_name = $data->input('emp_name');
      $activity -> emp_no = $data->input('emp_no');        
      $activity -> emp_phno = $data->input('emp_phno');        
      $activity -> emp_address = $data->input('emp_address');
      $activity -> emp_position = $data->input('emp_position');
      $activity -> password = $data->input('password');
      $activity -> emp_email = $data->input('emp_email');        
      $activity -> emp_joindate = $data->input('emp_joindate');        
      $activity -> dateofbirth = $data->input('dateofbirth');
      $activity -> gender = $data->input('gender');
      $activity -> emp_nrc = $data->input('emp_nrc');    
      // handle the is_uploaded_file
         if($data->hasFile('emp_img')){
          $path =$data->file('emp_img')->storeAs("activityprofile","emp_image_".$activity -> emp_name.".jpg",['disk'=>'public']);  
          $imgname = substr($path,strlen("activityprofile/"));  
         }
         
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

    
}