<form method="post" action="{{route('update')}}" enctype="multipart/form-data" >
            @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <input type="text" class="form-control" id="id" name="id" value="{{$activity -> id}}" hidden>
                                <label for="activity_title" class="col-form-label"> Title:  </label>
                                <input type="text" class="form-control" id="activity_title" name="activity_title" value="{{$activity -> Title}}" required>
                              </div>
                              <div class="form-group">
                                <label for="activity_description" class="col-form-label">  Description</label>
                                <input type="text" class="form-control" id="activity_description" name="activity_description" value="{{$activity -> Description}}" required >
                              </div>
                              <div class="form-group">
                                <label for="activity_image" class="col-form-label"> Activity image</label>
                                <input type="file" class="form-control" id="activity_image" name="activity_image">
                              </div> 
                                <div class="form-group">
                                  <label for="activity_date" class="col-form-label"> Activity Date</label>
                                  <input type="date" class="form-control" id="activity_date" name="activity_date" value="{{$activity -> Activities_Date}}" required>
                                </div>
                         </div>
                         <button type="submit" class="btn btn-info" style="width: 85px;  font-size:13px;"> <i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                    </div>
                </div>  
          </form>