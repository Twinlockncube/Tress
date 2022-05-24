@extends('layouts.frame')

@section('content')

<div class="left-pane">

<div class="inner-pane form-inline">
  <div class="form-group">
            <label for="exampleInputName2">{{__('Class')}} &nbsp;&nbsp;</label>
            	<div class="col-xs-1">
            <input type="text"  class="form-control form-control-sm mb-2" name="group" id="group">
        	</div>
  </div>

    <div class="form-group">
    <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp{{'Category'}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<div class="col-xs-1">
		<select class="form-control form-control-sm mdb-select md-form">
		  <option value="" disabled selected>Choose Category</option>
		  <option value="1">Test</option>
		  <option value="2">Exercise</option>
		  <option value="3">Group Work</option>
		  <option value="3">Exam</option>
		</select>
	</div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail2">{{'Total'}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name="total" id="total" >
  </div>
  </div>
 </div>

 <div class="form-inline inner-pane">
  <div class="form-group">
    <label for="exampleInputEmail2">{{__('Subject Code')}}&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="code" id="code">
	</div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Subject')}}&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name = "subject" id="subject">
	</div>
  </div>
  <div class="form-group">
    <label for="exampleInputName2">{{__('Title')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" id="exampleInputEmail2">
  </div>
  </div>
  <div class="form-group">
        <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Date')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-xs-1">
        <input type="date" class="form-control form-control-sm mb-2" id="date">
      </div>
  </div>
  </div>

 <div class="bottom-wing form-inline">
    <div class="form-group">
    <label for="exampleInputEmail2">{{__('%age weight')}}</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm input-sm mb-2" name="weight" id="weight">
	</div>
  </div>
  <div class="form-group">
  <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Parent Exam')}}</label>
<div class="col-xs-1">
  <input type="email" class="form-control form-control-sm mb-2" id="exampleInputEmail2">
</div>
</div>
 </div>
 </div>

 <div class="listing">
	<table class="table table-striped table-sm yajra-datatable">
    <thead>
      <tr>
		<th>#</th>
        <th>Student Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
 </div>
 <div class="submitter">
	<button type="button" class="btn btn-secondary form-control-sm mb-2">Submit</button>
 </div>


 <script>
 var table;
 var class_id;
 var i = 0;

 $('#group').focusout(function () {
  i++;
  class_id = $('#group').val();
  var ass_code = $('#code').val();
  var url = '{{ route("assessment.list",["group"=>":id","code"=>":code"]) }}';
  url = url.replace(':code',ass_code);
  url = url.replace(':id',class_id);
  alert(url);
  if(i==1){
      table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
          pageLength: 20,
          ajax: url,
          columnDefs:[{
            'defaultContent':'- -','targets':'_all'
          }],
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'last_name', name: 'last_name'},
              {data: "results.0.score",    name: "results" }
          ]
      });
  }
  else{
      //this changes url so that one with updated parameter used
      table.ajax.url(url).load();
  }
//$('table').dataTable({searching: false, paging: false, info: false});
});


$('#code').focusout(function(){
  var code = $('#code').val();
  $.ajax({
      type:'get',
      url:'{{route("assessment.subject")}}',
      data:{'code':code,
            'group':class_id,
            },
      success: function(response){
        var sub = JSON.parse(response);
        if(sub){
          $('#subject').val(sub.name);
        }
        else{
          //alert("Subject Not Found");
          swal('Tress',"Subject Not Found",'error');
        }
      },
      error: function(resp){
        swal('Tress',resp.msg,'error');
      }
  });
});
 </script>
@endsection
