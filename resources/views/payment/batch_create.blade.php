@extends('layouts.frame')

@section('content')

<form method="post"   id="form_header">
  @csrf
<div class="left-pane">

<div class="inner-pane form-inline">
  <div class="form-group" id="pay-form">
            <label for="group">{{__('Sponsor')}} &nbsp;&nbsp;</label>
            	<div class="col-xs-1">
            <input type="text"  class="form-control form-control-sm mb-2" name="sponsor" id="sponsor"/>
        	</div>
  </div>

  <div class="form-group">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#AssModal">{{__('Currency')}}</a>&nbsp;&nbsp;
  <div class="col-xs-1">
    <input type="text" class="form-control form-control-sm mb-2" name ="currency" id="currency">
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
    <label for="sub">{{__('Transaction Type')}}&nbsp;&nbsp;</label>
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
        <label for="description">{{__('Total Amount')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-xs-1">
        <input type="text" class="form-control form-control-sm mb-2" name="total" id="total">
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

<form id="pay">
    @csrf
 <div class="listing">
	<table class="table table-editable table-striped table-sm payment-datatable">
    <thead>
      <tr>
  		    <th>#</th>
          <th>Student Number</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Amount</th>
          <th>Reference No</th>
          <th>Action</th>
      </tr>


    </thead>
    <tbody>
      <tr>
          <td>1</td>
          <td><input type="text" name="student[]" placeholder="Student Id" size="20" /></td>
          <td><input type="text" name="last_name[]" placeholder="Last Name" size="20" /></td>
          <td><input type="text" name="name[]" placeholder="First Name" size="20" /></td>
          <td><input type="text" name="amount[]" class="amount" id="amount" placeholder="Amount" size="20" /></td>
          <td><input type="text" name="reference_no[]" placeholder="Reference" size="20" /></td>
          <td><button class="btn btn-sm btn-outline-danger" onClick="deleteLine(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </button>
          </td>
      </tr>
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
  var std_line_num =1;

  $('.payment-datatable').on('keydown','td',function(e){
   let del_butt = '<button class="btn btn-sm btn-outline-danger" onClick="deleteLine(event)">'
            +        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'
            +        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'
              +       ' <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'
                    +  '</svg>'
                      +'</button>';
    let keyCode = e.keyCode;

    if(keyCode!==9) return;
    let $lastTr = $('tr:last',$('.payment-datatable'));
    let $lastTd = $('td:last',$lastTr);
    if(($(e.target).closest('td')).is($lastTd)){
      std_line_num = std_line_num+ 1;
      let obj_line =  '<tr>'
                            +'<td>'+ std_line_num +'</td>'
                            +'<td><input type="text" name="student[]" placeholder="Student Id" size="20" /></td>'
                            +'<td><input type="text" name="last_name[]" placeholder="Last Name" size="20" /></td>'
                            +'<td><input type="text" name="name[]" placeholder="First Name" size="20" /></td>'
                            +'<td><input type="text" name="amount[]" class="amount" id="amount" placeholder="Amount" size="20" /></td>'
                            +'<td><input type="text" name="reference[]" placeholder="Reference" size="20" /></td>'
                            +'<td>'+del_butt+'</td>'
                        +'</tr>';
      $lastTr.after(obj_line);
    }
  });

  $('#group').focusin(function(){
    $('input').not(this).val("");
  });

  $('#amount').blur(function(){
    let init_amount = parseFloat($('#total').val());
    let this_amount = parseFloat($(this).val());
    let curr_total = init_amount + this_amount;
    $('#total').val(curr_total);
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
       let data = $('#pay').serializeArray();
       console.log(data);

      /*  var lines = new Array();
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
        });*/

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
 function deleteLine(event){
   event.preventDefault();
   if($(event.target).closest('tbody').children().length==1){
     var num =0;
     $(event.target).closest('tr').children().each(function(){
       if($(this).children().length==0){
         if(num==0){
           num++;
         }
         else {
           $(this).html("");
         }
       }
     });
   }
   else{
     var curr_element = $(event.target);
     var line_num = parseInt(curr_element.closest('tr').children().eq(0).html());
     $.each(curr_element.closest('tbody').children(),function(){
         var this_line = parseInt($(this).children().eq(0).html());
         if(this_line>line_num){
           $(this).children().eq(0).html(--this_line);
         }
     });
     curr_element.closest('tr').remove();
     //alert($('.obj-datatable > tbody > tr').after(curr_element).length);
   }

   return false;
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
