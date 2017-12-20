<div class="container mt-4">
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Topic</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="topic" placeholder="Add Topic"/>
    </div>
    
</div>


<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Topic</label>
    
     <div class="col-sm-10">
        <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>             
    </div>
   
    <center><button class="btn btn-primary mt-4">Save</button></center>
</div>

<!--TABLE FOR Syllabus-->
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            <h3>Subject Name JAVA</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>Syllabus</th>
                    <th>Description</th>
                   
                    
                </thead>
                <tbody>
                   @foreach($topics as $topic)
                    <tr>
                        <td>
                            <!--pagkaedit sa add syllabus form nlng ilalabas ung data,dun na ieedit-->
                            <a href="" class="btn btn-sm btn-info text-light">Edit</a> 
                            <a href="" class="btn btn-sm btn-info text-light">Delete</a>
                        </td>
                        <td>{{ $topic->$name}}</td>
                        <td>{{ $topic->$description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           A Total Registered Topic of {{ $topics->count() }}
        </div>
        </div>
    </div>
</div>
</div>



