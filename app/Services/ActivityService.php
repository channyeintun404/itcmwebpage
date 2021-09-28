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
    public function updateActivity($data){        
        $result = $this->activityDao->updateActivity($data);
        return $result;
    }

  

}
