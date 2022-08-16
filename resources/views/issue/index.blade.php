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
                            <th>Details</th>
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
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Copy Id') }}</label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control form-control-sm input-sm @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

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
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Edition') }}</label>

                            <div class="col-md-6">
                                <input id="edition" type="text" class="form-control form-control-sm input-sm @error('edition') is-invalid @enderror" name="edition" value="{{ old('edition') }}" required autocomplete="edition" autofocus>

                                @error('edition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

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
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>
                            <div class="form-group row col-md-5 value">
                              <div class="col-md-6">
                                  <input id="worth" type="text" class="form-control form-control-sm input-sm @error('worth') is-invalid @enderror" name="worth" value="{{ old('worth') }}" placeholder="Amount" required autocomplete="worth" autofocus>

                                  @error('worth')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>


                              <div class="col-md-6">
                                  <input id="currency" type="text" class="form-control form-control-sm input-sm @error('currency') is-invalid @enderror" placeholder="Currency" name="currency" value="{{ old('currency') }}" required autocomplete="currency" autofocus>

                                  @error('currency')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="sid" class="col-md-4 col-form-label text-md-right"><a href="#" style="color:blue" onClick="adjust()" data-toggle="modal" data-target="#CatModal">{{__('Category')}}</a></label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control form-control-sm input-sm @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>

                                @error('category')
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

                                <button class="btn  btn-outline-danger" id="deleter" onClick="deleteBook(event)">
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
                    function registerBook(){
                      $.ajax({
                          type:'post',
                          url:"{{route('books.create')}}",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress','Student Captured Successfully','success');
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

                    function updateBook(){
                      $.ajax({
                          type:'post',
                          url:"{{route('books.update')}}",
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

                    function deleteBook(event){
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
                                type: 'get',
                                url: "{{route('books.delete')}}",
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

                    function viewStudents(row){
                      alert(row.students[0].id);
                    }
                    function viewBook(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      $.ajax({
                          type:'get',
                          url:"{{route('books.view')}}",
                          data:{id:id},
                          success: function(response){
                            $('#id').val(response.id);
                            $('#author').val(response.author);
                            $('#title').val(response.title);
                            $('#edition').val(response.edition);
                            $('#subject').val(response.subject_id);
                            $('#worth').val(response.worth);
                            $('#currency').val(response.currency_id);
                            $('#category').val(response.category);

                            $('#reg_form input').attr("readonly",true);
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
                        $('#reg_form input').attr("readonly",true);
                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              registerBook();
                            }
                            else{
                              updateBook();
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
                             ajax: "{{ route('issues.list') }}",
                             columnDefs:[
                               {visible:false,targets:[6]},
                             ],
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewIssue(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'copy.book.id', name: 'copy.book.id'},
                                 {data: 'copy_id', name: 'copy_id'},
                                 {data: function(row){
                                   if(row.students.length>1){

                                     return '<a href="#" data-toggle="modal" data-target="#StudentModal" style="color:black">'+"Group"+'</a>'
                                   }
                                   else{
                                     return '<a href="#" data-toggle="modal" data-target="#StudentModal" style="color:black">'+row.students[0].id+'</a>'
                                   }
                                 }, name: 'student_id'},
                                 {data: 'date', name: 'date'},
                                 {data: 'students', name: 'students'},
                             ]
                         });

                         $('.yajra-datatable tbody').on('click','td',function(){
                           student_list = table.cell(this,6).data();
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
