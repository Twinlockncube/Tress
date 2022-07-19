@extends('layouts.frame')

@section('content')
<div id="resultPane">

        <div id="resultLinks">
          <table class="table table-bordered yajra-datatable table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Class</th>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Student') }}</div>

                <div class="card-body">
                    <form id="reg_form">
                        @csrf

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control form-control-sm input-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-control-sm input-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control form-control-sm input-sm @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control form-control-sm input-sm @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                          <label for="girl" class="col-md-4 col-form-label text-md-right">{{ __('Girl') }}</label>
                            <div class="col-md-6">
                                <input id="girl" type="radio"  name="gender" value="{{ __(0) }}" >
                          <label for="boy" class="col-md-4 col-form-label text-md-right">{{ __('Boy') }}</label>
                                <input id="boy" type="radio"  name="gender" value="{{ __(1) }}">
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-sm input-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birth Entry No') }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="text" class="form-control form-control-sm input-sm @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('National ID No') }}</label>

                            <div class="col-md-6">
                                <input id="nid" type="text" class="form-control form-control-sm input-sm @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" required autocomplete="nid" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sid" class="col-md-4 col-form-label text-md-right">{{ __('School ID No') }}</label>

                            <div class="col-md-6">
                                <input id="sid" type="text" class="form-control form-control-sm input-sm @error('sid') is-invalid @enderror" name="sid" value="{{ old('sid') }}" required autocomplete="sid" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sid" class="col-md-4 col-form-label text-md-right"><a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#GuardModal">{{__('Guardian')}}</a></label>

                            <div class="col-md-6">
                                <input id="guardian" type="text" class="form-control form-control-sm input-sm @error('guardian') is-invalid @enderror" name="guardian" value="{{ old('guardian') }}" required autocomplete="guardian" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sid" class="col-md-4 col-form-label text-md-right">{{ __('Sponsor') }}</label>

                            <div class="col-md-6">
                                <input id="sponsor_id" type="text" class="form-control form-control-sm input-sm @error('nid') is-invalid @enderror" name="sponsor_id" value="{{ old('sponsor_id') }}" required autocomplete="sponsor_id" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <input id="class_group" type="text" class="form-control form-control-sm input-sm @error('class_group') is-invalid @enderror" name="class_group" value="{{ old('class_group') }}" required autocomplete="class_group" autofocus>

                                @error('class_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-inline btn-sm" id="submit" disabled="true">
                                    {{ __('Submit') }}
                                </button>
                                <button  class="btn btn-secondary btn-inline btn-sm" id="edit">
                                    {{ __('Edit') }}
                                </button>
                                <button class="btn btn-primary btn-inline btn-sm" id="new">
                                    {{ __('New') }}
                                </button>
                                <button class="btn  btn-outline-danger" id="deleter" onClick="deleteStudent(event)">
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
                    function registerStudent(){
                      $.ajax({
                          type:'post',
                          url:"/reg_student",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress','Student Captured Successfully','success');
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
                      console.log($('form').serialize());
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

                    function deleteStudent(event){
                      event.preventDefault();
                      //var id = $(event.target).parent().siblings(":first").next().html();
                      var id = $('#sid').val();
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
                                url: "/delete_student",
                                data:{id:id},
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

                    function viewStudent(event){
                      event.preventDefault();
                      //var id = $(event.target).parent().siblings(":first").next().html();
                      //var id = $(event.target).parent().siblings(":first").nextAll().eq(1).html();
                      var id = $(event.target).text();
                      $.ajax({
                          type:'get',
                          url:"/view_student",
                          data:{id:id},
                          success: function(response){
                            if(response.gender==1){
                              $('#boy').prop("checked",true);
                              $('#girl').prop("checked",false);
                            }
                            else{
                              $('#girl').prop("checked",true);
                              $('#boy').prop("checked",false);
                            }
                            $('#last_name').val(response.last_name);
                            $('#name').val(response.name);
                            $('#address').val(response.address);
                            $('#dob').val(response.dob);
                            $('#email').val(response.email);
                            $('#birth').val(response.birth);
                            $('#nid').val(response.nid);
                            $('#sid').val(response.id);
                            $('#guardian').val(response.guardian_id);
                            $('#sponsor_id').val(response.sponsor_id);

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
                              registerStudent();
                            }
                            else{
                              updateStudent();
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
                        });

                        $('#reg_form input').change(function(){
                            $('#submit').attr("disabled",false);
                        });

                        $(function () {

                         var table = $('.yajra-datatable').DataTable({
                             processing: true,
                             serverSide: true,
                             ajax: "{{ route('students.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewStudent(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'name', name: 'name'},
                                 {data: 'last_name', name: 'last_name'},
                                 {data: 'class_group_id', name: 'class_group_id'},
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
