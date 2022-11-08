@extends('layouts.frame')

@section('content')

<form method="post"   id="form_header">
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#AssModal">{{__('Assessment')}}</a>&nbsp;&nbsp;
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
  <label for="category">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp{{'Category'}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="col-xs-1">
<input type="text" class="form-control form-control-sm mb-2" name="category" id="category" >
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
</form>

<!-- Modal -->
<div class="modal fade"  id="AssModal" tabindex="-1" role="dialog" aria-labelledby="AssModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Assessments</h5>
        <button type="button" class="close btn-sm form-control-sm mb-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered assess-datatable table-sm table-striped" width="100%">
                  <thead class="thead-dark">
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
    <div id="list_sub">
      <div class="listing">
       <table class="table table-editable table-striped table-sm yajra-datatable">
         <thead class="thead-dark">
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
      <div class="bottom-wing">
       <button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="submit" id="submit">Submit</button>&nbsp;&nbsp;
       <button type="button" class="btn btn-info btn-sm form-control-sm mb-2 search" >Search</button>&nbsp;&nbsp;
       <button type="button" class="btn btn-secondary btn-sm form-control-sm mb-2" name="edit" id="edit">Edit</button>&nbsp;&nbsp;
       <button type="button" class="btn btn-dark btn-sm form-control-sm mb-2" name="new" id="new">New</button>
      </div>
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
      if(isNaN(score) || score>total || score<0){
        $(this).text("");
        swal('Tress','Unacceptable Value','warning');
        //$(this).focus();
      }
    }

  });

  $('#code').focusout(function(){
    var code = $('#code').val();
    var group = $('#group').val();
    var total =0;
    $.ajax({
        type:'get',
        url:'{{route("result.view")}}',
        data:{'id':code,'group':group},
        success: function(response){
          if(!response.msg){
            total = response.total;
            $('#form_header input').attr("readonly",false);
            $('#total').val(response.total);
            $('#sub').val(response.subject.id);
            $('#subject').val(response.subject.name);
            $('#title').val(response.title);
            $('#description').val(response.description);
            $('#category').val(response.category);
            $('#weight').val(response.perc_weight);
            $('#parent').val(response.parent_id);
            $('#date').val(response.date);
            $('#form_header input').not('#code').attr("readonly",true);

            search(total);
          }
          else{
            $('input').not('#group').val("");
            $('.yajra-datatable tbody > tr').remove();
            //$('#code').focus();
            swal('Tress',response.msg,'error');
          }
        },
        error: function(response){
          swal('Tress',response.responseJSON.message,'error');
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
        var assessment_id = $('#code').val();
        $('.yajra-datatable tbody tr').each(function(){
          var checker = $(this).find('td:eq(5)');
          var score = $(this).find('td:eq(4)').text();
          if(!(isNaN(score)) && checker.find('input:checkbox').is(':checked')){
                var id = $(this).find('td:eq(1)').text();
                var result = {};
                result['assessment_id'] = assessment_id;
                result['student_id'] =id;
                result['score'] = score;
                lines.push(result);
          }
        });

        var url = '/result/create';
         $.ajax({
                 type:'post',
                 url:url,
                 data:{"_token": "{{ csrf_token() }}", "lines":JSON.stringify(lines),"ass_code":assessment_id},
                 success: function(response){
                  // table.ajax.url(url).load();
                   table.column('selection:name').visible(false);
                   swal('Tress',response.msg,'success');
                 },
                 error: function(resp){
                   alert(resp.msg);
                 }
        });

     });

     $('#edit').click(function(){
       table.column('selection:name').visible(true);
       table.cells('.my_score').every(function(){
         $(this.node()).attr('contenteditable', 'true');
       });
     });

     $(function () {

          tableAss = $('.assess-datatable').DataTable({
          processing: true,
          serverSide: true,
          scrollY:        "150px",
          scrollX:        true,
          scrollCollapse: true,
          paging:         false,
          ajax: "{{ route('assessment.list') }}",
          columnDefs:[
            {title: 'No', targets: 0},
            {title: 'Id', targets: 1},
            {title: 'Subject', targets: 2},
            {title: 'Class', targets: 3},
            {title: 'Date', targets: 4},
          ],
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: function(row){
                return '<a href="#" onClick="selectAssess(event)" data-dismiss="modal" style="color:black">'+row.id+'</a>';
              }, name: 'id'},
              {data: 'subject.name', name: 'subject.name'},
              {data: 'class_group.name', name: 'class_group.name'},
              {data: 'date', name: 'date'},

          ]
      });

    });

 });

 function selectAssess(event){
   event.preventDefault();
   var id = $(event.target).text();
   $('#code').val(id);
   $('#code').focus();
   return false;
 }

 function adjust(){
   tableAss.columns.adjust().draw();
 }

 function search(total){
   i++;
   class_id = $('#group').val();
   var ass_code = $('#code').val();
   var url = '{{ route("result.list",["group"=>":id","code"=>":code"]) }}';
   url = url.replace(':code',ass_code);
   url = url.replace(':id',class_id);

   if(i==1){
       table = $('.yajra-datatable').DataTable({
           processing: true,
           //serverSide: true,
           pageLength: 20,
           ajax: url,
           dom: "Bfrtip",
           buttons: [{extend:'excel',
           title: $('#subject').val()+" Marks Schedule "+class_id +"\n"+
                  "Date: "+$('#date').val() + "  Title: "+$('#title').val(),
           exportOptions: {
                columns: ':visible',
                modifier: {
                  page: 'all',
                  search: 'none'
                }}},
                {extend:'pdf',
                title:$('#subject').val()+" Marks Schedule "+class_id +"\n"+
                      "Date: "+$('#date').val() + "  Title: "+$('#title').val(),
                exportOptions: {
                     columns: ':visible',
                     modifier: {
                       page: 'all',
                       search: 'none'
                     }}}
              ],
           columnDefs:[
             {'defaultContent':'','targets':'_all'},
             { className: "my_score", "targets": [ 4 ],
              render: function(data,type,row){
                var the_color = 'black';
                if(parseFloat(data)/total!=NaN && data/total<0.5){
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
                   mark = '';
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
 }

 </script>
@endsection
