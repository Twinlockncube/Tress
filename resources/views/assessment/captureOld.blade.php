@extends('layouts.frame')

@section('content')

<form method="post" action="{{ route('assessment.create')}}">
  @csrf
<div class="left-pane">

<div class="inner-pane form-inline">
  <div class="form-group">
            <label for="exampleInputName2">{{__('Class')}} &nbsp;&nbsp;</label>
            	<div class="col-xs-1">
            <input type="text"  class="form-control form-control-sm mb-2" name="group" id="group">
        	</div>
  </div>

  <div class="form-group">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:blue">{{__('Assessment')}}</a>&nbsp;&nbsp;
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="code" id="code">
  </div>
  </div>

  <div class="form-group">
    <label for="total">{{'Total'}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name="total" id="total" >
  </div>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp{{'Category'}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="col-xs-1">
  <select class="form-control form-control-sm mdb-select md-form" name="category" id="category">
    <option value="" disabled selected>Choose Category</option>
    <option value="1">Test</option>
    <option value="2">Exercise</option>
    <option value="3">Group Work</option>
    <option value="3">Exam</option>
  </select>
</div>
</div>

 </div>

 <div class="form-inline inner-pane">
  <div class="form-group">
    <label for="exampleInputEmail2">{{__('Subject Code')}}&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="sub" id="sub">
	</div>
  </div>
  <div class="form-group">
    <label for="subject">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Subject')}}&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name = "subject" id="subject">
	</div>
  </div>
  <div class="form-group">
    <label for="exampleInputName2">{{__('Title')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name="title" id="title">
  </div>
  </div>
  <div class="form-group">
        <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Description')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-xs-1">
        <input type="text" class="form-control form-control-sm mb-2" name="description" id="description">
      </div>
  </div>
  </div>

 <div class="bottom-wing form-inline">
    <div class="form-group">
    <label for="exampleInputEmail2">{{__('%age weight')}}&nbsp;&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm input-sm mb-2" name="weight" id="weight">
	</div>
  </div>
  <div class="form-group">
  <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Parent Exam')}}&nbsp;&nbsp;&nbsp;</label>
<div class="col-xs-1">
  <input type="email" class="form-control form-control-sm mb-2" name="parent" id="parent">
</div>
</div>

<div class="form-group">
      <label for="exampleInputEmail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Assessment Date')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <div class="col-xs-1">
      <input type="date" class="form-control form-control-sm mb-2" id="date">
    </div>
</div>
 </div>
 </div>

 <div class="listing">
	<table class="table table-editable table-striped table-sm yajra-datatable">
    <thead>
      <tr>
		<th>#</th>
        <th>Student Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Score</th>
        <th>Selection</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
 </div>
 <div class="submitter">
	<button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="submit" id="submit">Submit</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-info btn-sm form-control-sm mb-2 search" >search</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="edit" id="edit">Edit</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-dark btn-sm form-control-sm mb-2" name="new" id="new">New</button>
 </div>
</form>


 <script>

 $(document).ready(function(){

  /* $('body').on('click', '.my_score', function(){
   // The cell that has been clicked will be editable
   $(this).attr('contenteditable', 'true');
   var el = $(this);});*/
  /**/
  var table;
  var class_id;
  var i = 0;

  $('#sub').focusout(function(){
    var code = $('#sub').val();
    $.ajax({
        type:'get',
        url:'{{route("assessment.subject")}}',
        data:{'code':code},
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

  $('.search').click(function () {
   i++;
   class_id = $('#group').val();
   var ass_code = $('#code').val();
   var url = '{{ route("result.list",["group"=>":id","code"=>":code"]) }}';
   url = url.replace(':code',ass_code);
   url = url.replace(':id',class_id);

   if(i==1){
    // $('.my_score').attr('contenteditable','true');
       table = $('.yajra-datatable').DataTable({
           processing: true,
           serverSide: true,
           pageLength: 20,
           ajax: url,
           columnDefs:[
             {'defaultContent':'- -','targets':'_all'},
             { className: "my_score", "targets": [ 4 ],
              render: function(data,type,row){
                var the_color = 'black';
                if(data<50){
                  the_color = 'red';
                }
                return '<span style="color:'+the_color+'">'+data+'</span>'
              }
            },
             {'targets': [5],'visible':false}
           ],
           columns: [
               {data: 'DT_RowIndex', name: 'DT_RowIndex'},
               {data: 'id', name: 'id'},
               {data: 'name', name: 'name'},
               {data: 'last_name', name: 'last_name'},
               {data: function(row){
                 var mark;
                 if(row.score===null){
                   mark = '- -';
                 }
                 else{
                   mark = Math.round(row.score);
                 }
                 return mark;
               },name: 'score'},
               {data: 'selection', name: 'selection'},
           ]
       });
   }
   else{
       //this changes url so that one with updated parameter used
       table.ajax.url(url).load();
   }
 });

     function createAssessment(){
       $.ajax({
           type:'post',
           url:'{{ route("assessment.create")}}',
           data:$('form').serialize(),
           success: function(response){
             $('#code').val(response.id);
           },
           error: function(resp){
             console.log(resp);
             alert(resp.msg);
             //swal('Tress',resp.msg,'error');
           }
       });
     }

     $('#submit').click(function(){
       var data = table.$('.my_score').serialize();
       console.log(data);
       alert("The following");
       //createAssessment();
     });

     $('#edit').click(function(){
       table.column('selection:name').visible(true);
       //console.log(col);
       table.cells('.my_score').every(function(){
         $(this.node()).attr('contenteditable', 'true');
       });
     });

 });


 </script>
@endsection
