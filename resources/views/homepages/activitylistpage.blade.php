<div class="table table-responsive">
      <table id="employeelist" class="table table-sm" style="font-size:13px" >
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Activity Title</th>
            <th scope="col">Activity Date</th>
            <th scope="col">Activity Description</th>
          
          </tr>
        </thead>
        <tbody >
            @foreach($activities as $activity)
            <tr>
                <td></td>
                <td> {{$activity->Title}}</td>
                <td> {{$activity->Activities_Date}}</td>
                <td> {{$activity->Description}}</td>
                <td><a href="/homepage/activity/{{$activity->id}}/edit" class="btn btn-sm btn-primary " >edit</a>
                </td>
            </tr>
           
            @endforeach
        </tbody>
      </table> 
    </div>