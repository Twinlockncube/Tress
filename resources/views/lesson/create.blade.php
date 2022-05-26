@extends('layouts.frame')

@section('content')
<div id="resultPane-less">

        <div id="resultLinks">
          <table class="table table-bordered lesson-datatable table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
            </table>
          </div>
</div>

<!-- Modal -->
<div class="modal fade"  id="GuardModal" tabindex="-1" role="dialog" aria-labelledby="GuardModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Guardians/Parents</h5>
        <button type="button" class="close btn-sm form-control-sm mb-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered guard-datatable table-sm table-striped" width="80%">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Surname</th>
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

<div class="container" id="container">
    <div class="row justify-content-end">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Lesson') }}
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#general">General</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#objectives">Objectives</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#activities">Activities</a>
                    </li>
                  </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                      <div id="general" class="container tab-pane active">
                        <form id="reg_form">
                          <!-- @csrf-->


                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control form-control-sm input-sm @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Subject Code') }}</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control form-control-sm input-sm @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lesson Id') }}</label>

                                <div class="col-md-6">
                                    <input id="lesson_id" type="text" class="form-control form-control-sm input-sm @error('lesson_id') is-invalid @enderror" name="lesson_id" value="{{ old('lesson_id') }}" required autocomplete="lesson_id" autofocus>

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="aim" class="col-md-4 col-form-label text-md-right">{{ __('Aim') }}</label>

                                <div class="col-md-6">
                                    <textarea rows="3" cols="8" id="aim"  class="form-control form-control-sm input-sm @error('aim') is-invalid @enderror" name="aim" value="{{ old('aim') }}" required autocomplete="aim" autofocus>
                                    </textarea>
                                    @error('end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark btn-inline btn-sm" id="submit" disabled="true">
                                        {{ __('Submit') }}
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <button  class="btn btn-secondary btn-inline btn-sm" id="edit">
                                        {{ __('Edit') }}
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-primary btn-inline btn-sm" id="new">
                                        {{ __('New') }}
                                    </button>
                                    <!--<label  class="col-md-4 col-form-label text-md-right">{{ __('Processing . . .') }}</label>-->
                                </div>

                            </div>

                        </form>
                      </div>
                      <div id="objectives" class="container tab-pane fade"><br>
                        <h3>Objectives</h3>
                        <p>        <table class="table table-bordered obj-datatable table-sm table-striped" width="100%">
                                          <thead>
                                              <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>1</td><td>&nbsp;&nbsp;&nbsp;</td>
                                              <td><button class="btn btn-outline-danger" onClick="deleteLine(event)">
                                                            <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                            </button></td>
                                            </tr>
                                          </tbody>
                                  </table></p>
                      </div>
                      <div id="activities" class="container tab-pane fade"><br>
                        <h3>Lesson Activities</h3>
                        <p>        <table class="table table-bordered act-datatable table-sm table-striped" width="100%">
                                          <thead>
                                              <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>1</td><td>&nbsp;&nbsp;&nbsp;</td>
                                              <td><button class="btn btn-outline-danger" onClick="deleteLine(event)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                            </button></td>
                                            </tr>
                                          </tbody>
                                  </table></p>
                      </div>
                    </div>


                    <script>
                    var new_entry = false;
                    var tableGuard;
                    var tableObj
                    function registerLesson(){
                      var objectives = new Array();
                      var activities = new Array();

                      $('.obj-datatable > tbody > tr').each(function(){
                        objectives.push($(this).children().eq(1).text());
                      });

                      $('.act-datatable > tbody > tr').each(function(){
                        activities.push($(this).children().eq(1).text());
                      });

                      //var general = $('#reg_form').serialize();
                      let title = $('#title').val();
                      let subject_id = $('#subject').val();
                      let aim = $('#aim').val();
                      $.ajax({
                          type:'post',
                          url:"{{route('reg_lesson')}}",
                          data:{"_token":"{{csrf_token()}}","title":title,"subject_id":subject_id,"aim":aim,"objectives":objectives,"activities":activities},
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress','Lesson Created Successfully','success');
                            $('#sid').val(response.sid);
                          },
                          error: function(resp){
                            swal('Tress',resp.msg,'error');
                          }
                      });
                    }

                    function adjust(){
                      tableGuard.columns.adjust().draw();
                    }

                    function selectGuard(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      $('#guardian').val(id);
                      return false;
                    }

                    function updateStudent(){
                      $.ajax({
                          type:'post',
                          url:"/update_student",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress','Student Edited Successfully','success');
                          },
                          error: function(resp){
                            swal('Tress',resp.msg,'error');
                          }
                      });
                    }

                    function deleteLesson(event){
                      event.preventDefault();
                      var id = $(event.target).closest('tr').children(":first").next().text();
                      swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover the record",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            if (willDelete) {
                              $.ajax({
                                type: 'get',
                                url: "{{route('delete_lesson')}}",
                                data:{id:id},
                                success: function(response){
                                  $('.lesson-datatable').DataTable().ajax.reload();
                                  swal('Tress',response.msg,'success');
                                },
                                error: function(response){
                                  if(response.status == 403){
                                    swal('Tress',"Error: "+403+ ". Check permissions ",'alert');
                                  }
                                  else{
                                    alert("Unspecified Error!");
                                  }
                                }
                              });
                            }
                          });

                      return false;
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

                    function showLesson(event){
                      event.preventDefault();
                      $('#reg_form input').attr("readonly",false);
                      var id = $(event.target).text();
                      $.ajax({
                          type:'get',
                          url:"{{route('lesson.show')}}",
                          data:{id:id},
                          success: function(response){
                            var activities = response.activities;
                            var objectives = response.objectives;
                            $('#title').val(response.title);
                            $('#subject').val(response.subject_id);
                            $('#lesson_id').val(response.id);
                            $('#start').val(response.start_time);
                            $('#end').val(response.end_time);
                            $('#aim').val(response.aim);
                            //$('#evaluation').val(response.evaluation);

                            /********Writing Objectives*****************/
                            var obj_num = objectives.length;
                            var curr_obj_rows = $('.obj-datatable > tbody').children().length;
                            var add_row_num = obj_num - curr_obj_rows;
                            if(add_row_num > 0){
                              for(var i=0;i<add_row_num;i++){
                                var obj_line =  '<tr><td>'+(++curr_obj_rows)+'</td><td contenteditable="true">&nbsp;&nbsp;&nbsp;</td>' +'<td><button class="btn btn-outline-danger" onClick="deleteLine(event)">'
                                        +        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'
                                        +        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'
                                          +       ' <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'
                                                +  '</svg>'
                                                  +'</button></td>'
                                  +'</tr>';
                                  var lastTr = $('tr:last',$('.obj-datatable'));
                                  lastTr.after(obj_line);
                              }
                            }

                          /*  if(add_row_num < 0){
                              for(var i=0;i<Math.abs(add_row_num);i++){
                                $('.obj-datatable > tbody > tr:last').remove();
                              }
                            }*/

                            var obj_index = 0;
                            if(objectives.length>0){
                              $.each($('.obj-datatable tbody').children(),function(){
                                var cols = $(this).children();
                                cols.eq(1).html(objectives[obj_index++].description);
                              });
                            }

                            /********End  Objectives*****************/

                            /********Writing Activities*****************/
                            var act_num = activities.length;
                            var curr_act_rows = $('.act-datatable > tbody').children().length;
                            var add_row_num1 = act_num - curr_act_rows;
                            if(add_row_num1 > 0){
                              for(var i=0;i<add_row_num1;i++){
                                var act_line =  '<tr><td>'+(++curr_obj_rows)+'</td><td contenteditable="true">&nbsp;&nbsp;&nbsp;</td>' +'<td><button class="btn btn-outline-danger" onClick="deleteLine(event)">'
                                        +        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'
                                        +        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'
                                          +       ' <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'
                                                +  '</svg>'
                                                  +'</button></td>'
                                  +'</tr>';
                                  var last_act_Tr = $('tr:last',$('.obj-datatable'));
                                  last_act_Tr.after(act_line);
                              }
                            }

                            var act_index = 0;
                            if(activities.length>0){
                              $.each($('.act-datatable tbody').children(),function(){
                                var act_cols = $(this).children();
                                act_cols.eq(1).html(activities[act_index++].description);
                              });
                            }


                            $('#reg_form input').attr("readonly",true);
                            $('#submit').attr("disabled",true);
                          },
                          error: function(resp){
                            alert(resp.msg);
                          }
                      });
                      return false;
                    }

                    $(document).ready(function(){
                    var obj_line_num = 1;
                    var act_line_num = 1;

                      $('.obj-datatable > tbody > tr > td, .act-datatable > tbody > tr > td ').each(function(){
                        $(this).attr("contenteditable",true);
                      });

                      $('.act-datatable').on('keydown','td',function(e){
                        var keyCode = e.keyCode;
                        if(keyCode!==9) return;
                        var $lastTr = $('tr:last',$('.act-datatable'));
                        var $lastTd = $('td:last',$lastTr);
                        if(($(e.target).closest('td')).is($lastTd)){
                          act_line_num = act_line_num+ 1;
                          var obj_line =  '<tr><td>'+ act_line_num+'</td><td>&nbsp;&nbsp;&nbsp;</td>' +'<td><button class="btn btn-outline-danger" onClick="deleteLine(event)">'
                                  +        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'
                                  +        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'
                                    +       ' <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'
                                          +  '</svg>'
                                            +'</button></td>'
                            +'</tr>';
                          $lastTr.after(obj_line);
                          $('.act-datatable > tbody > tr > td').each(function(){
                            $(this).attr("contenteditable",true);
                          });
                        }
                      });

                      $('.obj-datatable').on('keydown','td',function(e){
                        var keyCode = e.keyCode;
                        if(keyCode!==9) return;
                        var $lastTr = $('tr:last',$('.obj-datatable'));
                        var $lastTd = $('td:last',$lastTr);
                        if(($(e.target).closest('td')).is($lastTd)){
                          obj_line_num = obj_line_num+ 1;
                          row_num = $('.obj-datatable tbody').children().length;
                          var obj_line =  '<tr><td>'+ (++row_num) +'</td><td>&nbsp;&nbsp;&nbsp;</td>'
                              +'<td><button class="btn btn-outline-danger" onClick="deleteLine(event)">'
                                  +        ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">'
                                  +        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'
                                    +       ' <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'
                                          +  '</svg>'
                                            +'</button></td>'
                            +'</tr>';
                          $lastTr.after(obj_line);
                          $('.obj-datatable > tbody > tr > td').each(function(){
                            $(this).attr("contenteditable",true);
                          });
                        }
                      });


                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              registerLesson();
                            }
                            else{
                              updateLesson();
                            }
                            $('#submit').attr("disabled",true);
                        });

                        $('#edit').click(function(event){
                            event.preventDefault();
                            new_entry = false;
                            $('#reg_form input').not('#sid').attr("readonly",false);

                        });

                        $('#new').click(function(event){
                            event.preventDefault();
                            new_entry = true;
                            $('#reg_form input').attr("readonly",false);
                            $('#reg_form')[0].reset();
                            $('#last_name').focus();
                            $('#submit').attr("disabled",false);
                            $('.obj-datatable > tbody > tr,.act-datatable > tbody > tr').not('.obj-datatable > tbody > tr:first,.act-datatable > tbody > tr:first').remove();
                            var first_obj = $('.obj-datatable > tbody > tr').children();
                            first_obj.eq(1).html("");
                            var first_act = $('.act-datatable > tbody > tr').children();
                            first_act.eq(1).html("");
                        });

                        $('#reg_form input').change(function(){
                            $('#submit').attr("disabled",false);
                        });

                        $(function () {

                         var table = $('.lesson-datatable').DataTable({
                             processing: true,
                             serverSide: true,
                             ajax: "{{ route('lesson.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="showLesson(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'title', name: 'title'},
                                 {data: 'subject_id', name: 'subject'},
                                 {
                                     data: 'action',
                                     name: 'action',
                                     orderable: true,
                                     searchable: true
                                 },
                             ]
                         });

                       });

                       $(function () {

                            tableGuard = $('.guard-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            scrollY:        "150px",
                            scrollX:        true,
                            scrollCollapse: true,
                            paging:         false,
                            ajax: "{{ route('guardians/list') }}",
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: function(row){
                                  return '<a href="#" onClick="selectGuard(event)" data-dismiss="modal" style="color:black">'+row.id+'</a>';
                                }, name: 'id'},
                                {data: 'last_name', name: 'last_name'},
                                {data: 'name', name: 'name'},

                            ]
                        });

                      });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
