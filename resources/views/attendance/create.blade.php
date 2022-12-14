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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#AssModal">{{__('Subject')}}</a>&nbsp;&nbsp;
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="subject" id="subject">
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
    <label for="sub">{{__('Subject Name')}}&nbsp;&nbsp;</label>
	<div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="sub" id="sub">
	</div>
  </div>

  <div class="form-group">
        <label for="description">{{__('Attendance')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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
    <thead class="thead-dark">
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
 <div class="bottom-wing submitter">
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

  $('#date').focusout(function(){
    var code = $('#subject').val();
    $.ajax({
        type:'get',
        url:'{{route("subjects.view")}}',
        data:{'id':code},
        success: function(response){
            $('#form_header input').attr("readonly",false);
            $('#sub').val(response.name);

            $('#form_header input').not('#subject').attr("readonly",true);

            search();

        },
        error: function(response){
          $('input').not('#group').val("");
          $('.register-datatable tbody > tr').remove();
          swal('Tress',errorMessage(response),'error');
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
        var subject_id = $('#subject').val();
        var mark_date = $('#date').val();
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
                attendance['subject_id'] = subject_id;
                attendance['student_id'] =id;
                attendance['punctual'] = punctual;
                lines.push(attendance);
          }
        });

        var url = "{{route('attendance.capture')}}";
         $.ajax({
                 type:'post',
                 url:url,
                 data:{"_token": "{{ csrf_token() }}", "lines":JSON.stringify(lines),"subject_id":subject_id,"date":mark_date},
                 success: function(response){
                   swal('Tress',response.msg,'success');
                 },
                 error: function(response){
                   swal('Tress',errorMessage(response),'error');
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
   id = $('#group').val();
   var subject_id = $('#subject').val();
   var date = $('#date').val();
   var url = '{{ route("attendance.list") }}';
   if(i==1){
            table = $('.register-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollCollapse: true,
            paging:   false,
            searching: false,
            ajax: {
              url:url,
              data: {id:id,subject_id:subject_id,date:date}
            },
            dom: "Bftip",
            buttons: [
              'excel','pdf','print'
            ],
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
