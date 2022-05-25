@extends('layouts.frame')

@section('content')
<div id="resultPane-less">

        <div id="resultLinks">
          <table class="table table-bordered cla_les-datatable table-sm table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Class</th>
                        <th>Lesson</th>
                        <th>Lesson_Title</th>
                        <th>Week_Ending</th>
                        <th>Subject</th>
                        <th>Created_by</th>
                        <th>Updated_by</th>
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
                        <th>Class</th>
                        <th>Lesson</th>
                        <th>Lesson Title</th>
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
                <div class="card-header">{{ __('Class Lesson') }}

                </div>

                <div class="card-body">
                    <div class="tab-content">
                      <div id="general" class="container tab-pane active">
                        <form id="reg_form">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                <div class="col-md-6">
                                    <input id="class_id" type="text" class="form-control form-control-sm input-sm @error('class_id') is-invalid @enderror" name="class_id" value="{{ old('class_id') }}" required autocomplete="class_id" autofocus>

                                    @error('class_id')
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

                                    @error('lesson_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Lesson Title') }}</label>

                                <div class="col-md-6">
                                    <input id="lesson_title" type="text" class="form-control form-control-sm input-sm @error('lesson_title') is-invalid @enderror" name="lesson_title" value="{{ old('lesson_title') }}" required autocomplete="lesson_title" autofocus>

                                    @error('lesson_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

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
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control form-control-sm input-sm @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control form-control-sm input-sm @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" autofocus>

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="completed" class="col-md-4 col-form-label text-md-right">{{ __('Completed') }}</label>

                                <div class="col-md-6">
                                    <input id="completed" type="checkbox" class=" form-control-sm input-sm @error('completed') is-invalid @enderror" name="completed" value="1" required autocomplete="completed" autofocus>

                                    @error('completed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="evaluation" class="col-md-4 col-form-label text-md-right">{{ __('Evaluation') }}</label>

                                <div class="col-md-6">
                                    <textarea rows="3" cols="8" id="evaluation"  class="form-control form-control-sm input-sm @error('aim') is-invalid @enderror" name="evaluation" value="{{ old('evaluation') }}" required autocomplete="evaluation" autofocus>
                                    </textarea>
                                    @error('evaluation')
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

                    </div>


                    <script>
                    var new_entry = false;
                    var tableGuard;
                    var tableObj
                    function reg_class_lesson(){
                      $.ajax({
                          type:'post',
                          url:"{{route('reg_class_lesson')}}",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.cla_les-datatable').DataTable().ajax.reload();
                            swal('Tress','Lesson Registered Successfully','success');
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

                    function updateClassLesson(){
                      $.ajax({
                          type:'post',
                          url:"{{route('update_class_lesson')}}",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.cla_les-datatable').DataTable().ajax.reload();
                            swal('Tress',response.msg,'success');
                          },
                          error: function(resp){
                            swal('Tress',resp.msg,'error');
                          }
                      });
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

                    function showClass_Lesson(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      $.ajax({
                          type:'get',
                          url:"{{route('class_lesson.show')}}",
                          data:{id:id},
                          success: function(response){
                            $('#class_id').val(response.class_group_id);
                            $('#lesson_id').val(response.lesson_id);
                            $('#lesson_title').val(response.lesson.title);
                            $('#subject').val(response.lesson.subject.name);
                            $('#start_date').val(response.start_date);
                            $('#end_date').val(response.end_date);
                            if(response.completed===0){
                              $('#completed').attr("checked",true);
                              $('#completed').attr("disabled","disabled");
                            }
                            else{
                              $('#completed').attr("checked",false);
                            }
                            $('#evaluation').val(response.evaluation);
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

                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              reg_class_lesson();
                            }
                            else{
                              updateClassLesson();
                            }
                            $('#submit').attr("disabled",true);
                        });

                        $('#edit').click(function(event){
                            $('#submit').attr("disabled",false);
                            $('#completed').attr("disabled",false);
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
                         var table = $('.cla_les-datatable').DataTable({
                             processing: true,
                             serverSide: true,
                             ajax: "{{ route('class_lesson.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: 'class_group_id', name: 'class_group_id'},
                                 {data: function(row){
                                   return '<a href="#" onClick="showClass_Lesson(event)" style="color:black">'+row.lesson_id+'</a>';
                                 }, name: 'lesson_id'},
                                 {data: 'lesson.title', name: 'lesson.title'},
                                 {data: 'end_date', name: 'end_date'},
                                 {data: 'lesson.subject_id', name: 'lesson.subject_id'},
                                 {data: 'creator', name: 'created_by'},
                                 {data: 'updater', name: 'updated_by'},
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
