@extends('layouts.frame')

@section('content')

<form method="post"   id="form_header">
  @csrf
<div class="left-pane">

<div class="inner-pane form-inline">
  <div class="form-group">
            <label for="group">{{__('Class')}} &nbsp;&nbsp;</label>
            	<div class="col-xs-1">
            <input type="text"  class="form-control form-control-sm mb-2" name="group" id="group"/>
        	</div>
  </div>

  <div class="form-group">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#AssModal">{{__('Lesson')}}</a>&nbsp;&nbsp;
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="lesson" id="lesson">
  </div>
  </div>

  <div class="form-group">
      <label for="date">{{__('Date')}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <div class="col-xs-1">
        <input type="date" class="form-control form-control-sm mb-2" id="date">
      </div>
  </div>

 </div>

 <div class="form-inline inner-pane">
  <div class="form-group">
    <label for="sub">{{__('Subject Code')}}&nbsp;&nbsp;</label>
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
        <label for="description">{{__('Title')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-xs-1">
        <input type="text" class="form-control form-control-sm mb-2" name="description" id="description">
      </div>
  </div>
  </div>

 <div class="bottom-wing form-inline">

 </div>
 </div>
</form>

<!-- Modal -->
<div class="modal fade"  id="AssModal" tabindex="-1" role="dialog" aria-labelledby="AssModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Lessons</h5>
        <button type="button" class="close btn-sm form-control-sm mb-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered attend-datatable table-sm table-striped" width="80%">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Date</th>

                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
          </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- End of Popup-->

<form id="marks">
    @csrf
 <div class="listing">
	<table class="table table-editable table-striped table-sm register-datatable">
    <thead>
      <tr>
		    <th>#</th>
        <th>Student Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Present</th>
        <th>Punctual</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
 </div>
 <div class="submitter">
	<button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="submit" id="submit">Submit</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-info btn-sm form-control-sm mb-2 search" >Search</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="edit" id="edit">Edit</button>&nbsp;&nbsp;
  <button type="button" class="btn btn-dark btn-sm form-control-sm mb-2" name="new" id="new">New</button>
 </div>
</form>


 <script>
 var i = 0;
 var table;
 var tableAss
 var test_var;

 $(document).ready(function(){

  var class_id;

  $('#group').focusin(function(){
    $('input').not(this).val("");
  });

  $('.yajra-datatable').on("blur","td",function(){
    var el_children = $('#myinput').is(':checkbox')
    var first_child = el_children[0];
    if(!($(this).children().first().is(':checkbox'))){
       var score = parseInt($(this).text());
       var total = parseInt($('#total').val());
      if(score>total){
        $(this).text("- -");
        alert("Unacceptable Value");
        //$(this).focus();
      }
    }
    /*if($(this).val()>$('#total').val()){
      alert("Unacceptable value");
      $(this).val("");
    }*/

  });

  $('#lesson').focusout(function(){
    var code = $('#lesson').val();
    var group = $('#group').val();
    $.ajax({
        type:'get',
        url:'{{route("lesson.view")}}',
        data:{'id':code,'group':group},
        success: function(response){
          if(!response.msg){
            $('#form_header input').attr("readonly",false);
            $('#sub').val(response.subject.id);
            $('#subject').val(response.subject.name);
            $('#description').val(response.title);
            $('#date').val(response.date);
            $('#form_header input').not('#lesson').attr("readonly",true);

            search();
          }
          else{
            $('input').not('#group').val("");
            $('.register-datatable tbody > tr').remove();
            //$('#code').focus();
            swal('Tress',response.msg,'error');
          }
        },
        error: function(resp){
          swal('Tress',resp.msg,'error');
        }
    });
  });

  $('.search').click(function () {
    //search();
    //table.clear().draw();
    //alert(table);
 });


     $('#submit').click(function(){

        var lines = new Array();
        var lesson_id = $('#lesson').val();
        $('.register-datatable tbody tr').each(function(){
          var checker = $(this).find('td:eq(5)').find('input:checkbox').is(':checked');
          var punctual =0;
          if(checker){
            punctual = 1;
          }
          var present = $(this).find('td:eq(4)').find('input:checkbox').is(':checked');
          if(present){
                var id = $(this).find('td:eq(1)').text();
                var attendance = {};
                attendance['lesson_id'] = lesson_id;
                attendance['student_id'] =id;
                attendance['punctual'] = punctual;
                lines.push(attendance);
          }
        });

        var url = "{{route('attendance.capture')}}";
         $.ajax({
                 type:'post',
                 url:url,
                 data:{"_token": "{{ csrf_token() }}", "lines":JSON.stringify(lines),"lesson_id":lesson_id},
                 success: function(response){
                   //table.ajax.url(url).load();
                   alert(response.msg);
                 },
                 error: function(resp){
                   alert(resp.msg);
                 }
        });

     });

     $('#edit').click(function(){
       table.column('selection:name').visible(true);
       //console.log(col);
       table.cells('.my_score').every(function(){
         $(this.node()).attr('contenteditable', 'true');
       });
     });


     $(function () {/*

    */});

 });

 function selectAssess(event){
   event.preventDefault();
   var id = $(event.target).text();
   $('#code').val(id);
   return false;
 }

 function adjust(){
   tableAss.columns.adjust().draw();
 }

 function search(){
   i++;
   class_id = $('#group').val();
   var less_code = $('#lesson').val();
   var url = '{{ route("attendance.list",["group"=>":id","code"=>":lesson"]) }}';
   url = decodeURIComponent(url);
   url = url.replace(':lesson',less_code);
   url = url.replace(':id',class_id);

   if(i==1){
            table = $('.register-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollCollapse: true,
            paging:         false,
            searching: false,
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'last_name', name: 'last_name'},
                {data: function(row){
                  if(row.punctual==null){
                    return '<input type="checkbox" name="presence">';
                  }
                  else{
                    return '<input type="checkbox" name="presence" checked="true">';
                  }
                }, name: 'presence'},
                {data: function(row){
                  if(row.punctual==1){
                    return '<input type="checkbox" name="punctual" checked="true">';
                  }
                  else{
                    return '<input type="checkbox" name="punctual">';
                  }
                }, name: 'punctual'},

            ]
        });

   }
   else{
       //this changes url so that one with updated parameter used
       table.ajax.url(url).load();
   }
 }

 </script>
@endsection
