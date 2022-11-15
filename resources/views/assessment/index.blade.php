@extends('layouts.frame')

@section('content')
<div id="resultPane">

        <div id="resultLinks">
          <table class="table table-bordered yajra-datatable table-sm table-striped">
                    <thead class="thead-dark">
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
                                <input id="id" type="text" class="form-control form-control-sm input-sm @error('id') is-invalid @enderror" name="id" value="{{ old('last_name') }}"  autocomplete="id" autofocus>

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
                                <input id="description" type="text" class="form-control form-control-sm input-sm @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

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
                              <select id="category" name="category" class="form-control form-control-sm">
                                <option value="n">Category</option>
                                <option value="0">Test</option>
                                <option value="1">Exercise</option>
                                <option value="2">Exam</option>
                              </select>
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
                                <input id="weight" type="text" class="form-control form-control-sm input-sm @error('nid') is-invalid @enderror" name="weight" value="{{ old('weight') }}"  autocomplete="weight" autofocus>

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
                                <input id="parent" type="text" class="form-control form-control-sm input-sm @error('parent') is-invalid @enderror" name="parent" value="{{ old('parent') }}"  autocomplete="parent" autofocus>

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
                                </button>&nbsp;&nbsp;

                                <button class="btn  btn-outline-danger" id="deleter" onClick="deleteAssessment(event)">
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
                    function createAssessment(){
                      $.ajax({
                          type:'post',
                          url:'{{ route("assessment.create")}}',
                          data:$('form').serialize(),
                          success: function(response){
                            $('#id').val(response.id);
                            swal('Tress','Assessment Created Successfully','success');
                            $('.yajra-datatable').DataTable().ajax.reload();
                          },
                          error: function(response){
                            console.log(response);
                            swal('Tress',errorMessage(response),'error');
                          }
                      });
                    }

                    function updateAssessment(){
                      $.ajax({
                          type:'post',
                          url:"{{route('update_assessment')}}",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress','Assessment Edited Successfully','success');
                          },
                          error: function(response){
                            swal('Tress',errorMessage(response),'error');
                          }
                      });
                    }

                    function deleteAssessment(event){
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
                                url: "{{route('delete_assessment')}}",
                                data:{"_token":"{{csrf_token()}}",id:id},
                                success: function(response){
                                  $('.yajra-datatable').DataTable().ajax.reload();
                                  swal('Tress',response.message,'success');
                                },
                                error: function(response){
                                    swal('Tress',errorMessage(response),'error');
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
                              $('#weight').val();
                              swal('Tress','Weight limit exceeded','error');
                            }
                          },
                          error: function(response){
                            swal('Tress',errorMessage(response),'error');
                          }
                      });
                    }

                    function checkExistence(){
                      var id = $('#sub').val();
                      $.ajax({
                          type:'get',
                          url:"{{route('subjects.existence')}}",
                          data:{id:id},
                          success: function(response){
                            if($.isEmptyObject(response)){
                              $('#sub').val('');
                              swal('Tress','Subject does not exist','warning');
                            }
                          },
                          error: function(response){
                            $('#sub').val('');
                            swal('Tress',response.responseJSON.message,'error');
                          }
                      });
                      return false;
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

                            $('#id').val(response.id);
                            $('#title').val(response.title);
                            $('#description').val(response.description);
                            $('#group').val(response.class_group_id);
                            $('#sub').val(response.subject.name);
                            $('#category').val(response.category);
                            $('#total').val(response.total);
                            $('#weight').val(response.perc_weight);
                            $('#parent').val(response.parent_id);
                            $('#date').val(response.date);

                            $('form input').attr("readonly",true);
                            $('#submit').attr("disabled",true);
                          },
                          error: function(response){
                            swal('Tress',errorMessage(respose),'error');
                          }
                      });
                      return false;
                    }
                    var new_entry = true;
                    $(document).ready(function(){

                      $('#sub').on('blur',function(){
                        checkExistence();
                      });

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
                            //$('#reg_form')[0].reset();
                            $('#id').val("");
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
                             dom: "Bftip",
                             buttons: [
                               'excel','pdf','print'
                             ],
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewAssess(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'subject.name', name: 'subject.name'},
                                 {data: 'class_group.name', name: 'class_group.name'},
                                 {data: 'date', name: 'date'},
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
