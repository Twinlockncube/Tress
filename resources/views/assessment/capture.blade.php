@extends('layouts.frame')

@section('content')
<div id="resultPane">

        <div id="resultLinks">
          <table class="table table-bordered yajra-datatable table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
            </table>
          </div>
</div>
<div class="container" id="container">
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Assessment') }}</div>

                <div class="card-body">
                    <form id="reg_form">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control form-control-sm input-sm @error('id') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

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
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control form-control-sm input-sm @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <input id="group" type="text" class="form-control form-control-sm input-sm @error('description') is-invalid @enderror" name="group" value="{{ old('description') }}" required autocomplete="group" autofocus>

                                @error('group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lesson" class="col-md-4 col-form-label text-md-right"><a href="#">{{ __('Lesson') }}</a></label>

                            <div class="col-md-6">
                                <input id="lesson" type="text" class="form-control form-control-sm input-sm @error('lesson') is-invalid @enderror" name="lesson" value="{{ old('lesson') }}" required autocomplete="lesson" autofocus>

                                @error('lesson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="sub" type="text" class="form-control form-control-sm input-sm @error('subject') is-invalid @enderror" name="sub" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <input id="category" type="email" class="form-control form-control-sm input-sm @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="text" class="form-control form-control-sm input-sm @error('birth') is-invalid @enderror" name="total" value="{{ old('total') }}" required autocomplete="total" autofocus>

                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control form-control-sm input-sm @error('nid') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parent" class="col-md-4 col-form-label text-md-right">{{ __('Parent') }}</label>

                            <div class="col-md-6">
                                <input id="parent" type="text" class="form-control form-control-sm input-sm @error('parent') is-invalid @enderror" name="parent" value="{{ old('parent') }}" required autocomplete="parent" autofocus>

                                @error('parent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control form-control-sm input-sm @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
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
                                </button>&nbsp;&nbsp;
                                <button  class="btn btn-secondary btn-inline btn-sm" id="edit">
                                    {{ __('Edit') }}
                                </button>&nbsp;&nbsp;
                                <button class="btn btn-primary btn-inline btn-sm" id="new">
                                    {{ __('New') }}
                                </button>

                                <!--<label  class="col-md-4 col-form-label text-md-right">{{ __('Processing . . .') }}</label>-->
                            </div>

                        </div>

                    </form>


                    <script>
                    var new_entry = false;
                    function createAssessment(){
                      $.ajax({
                          type:'post',
                          url:'{{ route("assessment.create")}}',
                          data:$('form').serialize(),
                          success: function(response){
                            $('#id').val(response.id);
                            $('.yajra-datatable').DataTable().ajax.reload();
                          },
                          error: function(resp){
                            alert(resp.msg);
                            //swal('Tress',resp.msg,'error');
                          }
                      });
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

                    function deleteStudent(event){
                      event.preventDefault();
                      var id = $(event.target).parent().siblings(":first").next().html();
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

                    function validateTotal(parent){
                      $.ajax({
                          type:'get',
                          url:'{{route("assessment.val_total")}}',
                          data:{parent:parent},
                          success: function(response){
                            var weight = $('#weight').val();
                            var sum_sofar = response.children_sum_perc_weight;
                            if(weight+sum_sofar>100){
                              alert('Weight limit exceeded');
                            }
                            else{
                              alert('Good weight');
                            }
                          },
                          error: function(resp){
                            alert(resp.msg);
                          }
                      });
                    }

                    function viewAssess(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      //var id = $(event.target).parent().siblings(":first").nextAll().eq(1).html();
                      $.ajax({
                          type:'get',
                          url:'{{route("assessment.view")}}',
                          data:{id:id},
                          success: function(response){
                            //console.log(response);
                            $('#id').val(response.id);
                            $('#title').val(response.title);
                            $('#description').val(response.description);
                            $('#group').val(response.class_group_id);
                            $('#sub').val(response.subject.name);
                            $('#category').val(response.category);
                            $('#total').val(response.total);
                            $('#weight').val(response.perc_weight);
                            $('#parent').val(response.parent);
                            $('#date').val(response.date);

                            $('form input').attr("readonly",true);
                            $('#submit').attr("disabled",true);
                          },
                          error: function(resp){
                            alert(resp.msg);
                          }
                      });
                      return false;
                    }
                    var new_entry = true;
                    $(document).ready(function(){

                        $('#parent').focusout(function(){
                          var parent = $('#parent').val();
                          if(parent.length>0){
                            validateTotal(parent);
                          }
                        });

                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              createAssessment();
                            }
                            else{
                              updateAssessment();
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
                             ajax: "{{ route('assessment.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewAssess(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'subject.name', name: 'subject'},
                                 {data: 'class_group.name', name: 'class_group'},
                                 {data: 'date', name: 'date'},
                                 {
                                     data: 'action',
                                     name: 'action',
                                     orderable: true,
                                     searchable: true
                                 },
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
