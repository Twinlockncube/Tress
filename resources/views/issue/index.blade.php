@extends('layouts.frame')

@section('content')
<div id="resultPane">

  <div id="resultLinks">
    <table class="table table-bordered yajra-datatable table-sm table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Book_Id</th>
                      <th>Book_Copy</th>
                      <th>Student</th>
                      <th>Date_Received</th>
                      <th>Status</th>
                      <th>Details</th>
                      <th>Student_list</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
      </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade"  id="StudentModal" tabindex="-1" role="dialog" aria-labelledby="StudentModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="modalTitle">Borrowed By:</h5>
  <button type="button" class="close btn-sm form-control-sm mb-2" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <table class="table table-bordered borrow-datatable table-sm table-striped" width="80%">
            <thead class="thead-light">
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
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">{{ __('Copy Issue') }}</div>

          <div class="card-body">
              <form id="reg_form">
                  @csrf

                  <div class="form-group row">
                      <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Issue Id') }}</label>

                      <div class="col-md-6">
                          <input id="id" type="text" class="form-control form-control-sm input-sm @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                          @error('id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="copy_id" class="col-md-4 col-form-label text-md-right">{{ __('Copy Id') }}</label>

                      <div class="col-md-6">
                          <input id="copy_id" type="text" class="form-control form-control-sm input-sm @error('copy_id') is-invalid @enderror" name="copy_id" value="{{ old('copy_id') }}" required autocomplete="copy_id" autofocus>

                          @error('copy_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Book Title') }}</label>

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
                      <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Issue date') }}</label>

                      <div class="col-md-6">
                          <input id="date" type="date" class="form-control form-control-sm input-sm @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="title" autofocus>

                          @error('date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Return Status') }}</label>

                      <div class="col-md-6">
                        <select id="status" class="form-control form-control-sm">
                          <option value="0">Not Applicable</option>
                          <option value="1">Fully Returned</option>
                          <option value="2">Partially Returned</option>
                          <option value="3">Not Returned</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student(s)') }}</label>

                      <div class="col-md-6">
                          <input id="students" type="text" class="form-control form-control-sm input-sm @error('title') is-invalid @enderror" name="students" value="{{ old('students') }}" required autocomplete="students" autofocus>

                          @error('students')
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
                          </button>
                          <button  class="btn btn-secondary btn-inline btn-sm" id="edit">
                              {{ __('Edit') }}
                          </button>
                          <button class="btn btn-primary btn-inline btn-sm" id="new">
                              {{ __('New') }}
                          </button>

                          <button class="btn  btn-outline-danger" id="deleter" onClick="deleteIssue(event)">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                          </button>

                          <!--<label  class="col-md-4 col-form-label text-md-right">{{ __('Processing . . .') }}</label>-->
                      </div>

                  </div>

              </form>


              <script>
              var new_entry = false;
              var tableGuard;
              function registerIssue(){
                $.ajax({
                    type:'post',
                    url:"{{route('issues.create')}}",
                    data:$('form').serialize(),
                    success: function(response){
                      $('.yajra-datatable').DataTable().ajax.reload();
                      $('#id').val(response.id);
                      swal('Tress','Issue Captured Successfully','success');
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

              function updateIssue(){
                $.ajax({
                    type:'post',
                    url:"{{route('issues.update')}}",
                    data:$('form').serialize(),
                    success: function(response){
                      $('.yajra-datatable').DataTable().ajax.reload();
                      swal('Tress',response.msg,'success');
                    },
                    error: function(resp){
                      swal('Tress',resp.msg,'error');
                    }
                });
              }

              function deleteIssue(event){
                event.preventDefault();
                var id = $('#id').val();
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
                          type: 'delete',
                          url: "{{route('issues.delete')}}",
                          data:{"_token":"{{csrf_token()}}",id:id},
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
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

              function checkAvailability(){
                var id = $('#copy_id').val();
                $.ajax({
                    type:'get',
                    url:"{{route('copies.availability')}}",
                    data:{id:id},
                    success: function(response){
                      if($.isEmptyObject(response)){
                        $('#copy_id').val('');
                        swal('Tress','Copy does not exist','warning');
                      }
                      else if(response.availability==0){
                        $('#copy_id').val('');
                        swal('Tress','Chosen book copy unavailable','warning');
                      }
                      else{
                        $('#title').val(response.book.title);
                      }
                    },
                    error: function(resp){
                      alert(resp.msg);
                    }
                });
                return false;
              }

              function viewIssue(event){
                event.preventDefault();
                var id = $(event.target).text();
                $.ajax({
                    type:'get',
                    url:"{{route('issues.view')}}",
                    data:{id:id},
                    success: function(response){
                      $('#id').val(response.id);
                      $('#copy_id').val(response.copy_id);
                      $('#title').val(response.copy.book.title);
                      $('#date').val(response.date);
                      if(response.status==1){
                        $('#status').val("1");
                      }
                      else if(response.status==2){
                        $('#status').val("2");
                      }
                      else{
                        $('#status').val("3");
                      }

                      let borrower_list = "";
                      let first_pass = true;
                      $.each(response.students,function(){
                        if(first_pass){
                          borrower_list+=this.id;
                          first_pass = false
                        }
                        else{
                          borrower_list+=","+this.id;
                        }
                      });
                      $('#students').val(borrower_list);
                      $('#reg_form input').attr("readonly",true);
                      $('#reg_form select').attr("disabled",true);
                      $('#submit').attr("disabled",true);
                    },
                    error: function(resp){
                      alert(resp.msg);
                    }
                });
                return false;
              }

              function showBorrowers(student_list){
                  $('.borrow-datatable > tbody > tr').remove();
                curr_obj_rows = 0;
                student_list.forEach((student) => {

                  var obj_line =  '<tr><td>'+(++curr_obj_rows)+'</td><td>'+student.id+'</td>' +'<td>'+student.name+'</td>' +'<td>'+student.last_name+'</td></tr>'

                  $('.borrow-datatable tbody').append(obj_line);
                });

              }

              $(document).ready(function(){

                  $('#copy_id').on('blur',function(){
                    checkAvailability();
                  });

                  $('#reg_form input').attr("readonly",true);
                  $('#reg_form select').attr("disabled",true);
                  $('#submit').click(function(event){
                      event.preventDefault();
                      if(new_entry){
                        registerIssue();
                      }
                      else{
                        updateIssue();
                      }
                      $('#submit').attr("disabled",true);
                  });

                  $('#edit').click(function(event){
                      event.preventDefault();
                      if($('#id').val().length >0){
                        new_entry = false;
                        $('#reg_form input').not('#id').attr("readonly",false);
                      }

                  });

                  $('#new').click(function(event){
                      event.preventDefault();
                      new_entry = true;
                      $('#reg_form input').not('#title').attr("readonly",false);
                      $('#reg_form')[0].reset();
                      $('#last_name').focus();
                      $('#submit').attr("disabled",false);
                  });

                  $('#reg_form input').change(function(){
                      $('#submit').attr("disabled",false);
                  });

                  $(function () {

                   var table = $('.yajra-datatable').DataTable({
                       processing: true,
                       serverSide: true,
                       ajax: "{{ route('issues.list') }}",
                       columnDefs:[
                         {visible:false,targets:[7]},
                         {visible:false,searchable:true,targets:[8]},
                       ],
                       columns: [
                           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                           {data: function(row){
                             return '<a href="#" onClick="viewIssue(event)" style="color:black">'+row.id+'</a>';
                           }, name: 'id'},
                           {data: 'copy.book.id', name: 'copy.book.id'},
                           {data: 'copy_id', name: 'copy_id'},
                           {data: function(row){
                             return '<a href="#" data-toggle="modal" data-target="#StudentModal" style="color:black">'+row.borrower+'</a>'
                           } , name: 'borrower'},
                           {data: 'date', name: 'date'},
                           {data:'return_status',  name: 'return_status'},
                           {data: 'students', name: 'students'},
                           {data: 'student_list', name: 'student_list'},
                       ]
                   });

                   $('.yajra-datatable tbody').on('click','td',function(){
                     student_list = table.cell(this,7).data();
                     showBorrowers(student_list);
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
