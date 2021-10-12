<?php

namespace App\Services;

use App\Dao\ActivityDao;
use Illuminate\Http\Request;
use App\Models\Activity;
use DB;

class ActivityService
{

    protected $activityDao;

    public function __construct(ActivityDao $activityDao){

        $this->activityDao = $activityDao;
    }

    //get all activity
    public function getAllactivity(){
        return $this->activityDao->getAll();
    }

    //save new activity
    public function saveActivity($request){
        $result = $this->activityDao->saveActivity($request);
        return $result;
    }

    //get activity By Id
    public function getById($id){        
        return $this->activityDao->getById($id);
    }

    //update activity
    public function updateActivity($request){        
        $result = $this->activityDao->updateActivity($request);
        return $result;
    }

    //update activity
    public function confirmActivity($request){        
        $result = $this->activityDao->confirmActivity($request);
        return $result;
    }

      // get last 3 activity
      public function getlastthreeactivity(){
        return $this->activityDao->getlastthree();
    }

    //delete all activity
    public function deleteallActivity($request){
        $result = $this->activityDao->deleteallActivity($request);
        return $result;
    }

     //delete all Alert activity
     public function deleteallAlertActivity($request){
        $result = $this->activityDao->deleteallAlertActivity($request);
        return $result;
     }

}
