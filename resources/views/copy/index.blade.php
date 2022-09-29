      @extends('layouts.frame')

@section('content')
<div id="resultPane">

        <div id="resultLinks">
          <table class="table table-bordered yajra-datatable table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Book Title</th>
                            <th>Subject Id</th>

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
                <div class="card-header">{{ __('Book Copies') }}</div>

                <div class="card-body">
                    <form id="reg_form">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Book Id') }}</label>

                            <div class="col-md-6">
                                <input id="book_id" type="text" class="form-control form-control-sm input-sm @error('book_id') is-invalid @enderror" name="book_id" value="{{ old('book_id') }}" required autocomplete="book_id" autofocus>

                                @error('book_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control form-control-sm input-sm @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="availability" class="col-md-4 col-form-label text-md-right">{{__('Available')}}</label>

                                <div class="col-md-6">
                                  <input id="availability" type="text" class="form-control form-control-sm input-sm @error('availability') is-invalid @enderror" name="availability" value="{{ old('category') }}" required autocomplete="availability" autofocus>

                                     @error('availability')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                               </div>
                          </div>

                        <div class="form-group row">
                            <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location_id" type="text" class="form-control form-control-sm input-sm @error('location_id') is-invalid @enderror" name="location_id" value="{{ old('location_id') }}" required autocomplete="location_id" autofocus>

                                @error('location_id')
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
                    function registerCopy(){
                      $.ajax({
                          type:'post',
                          url:"{{route('copies.create')}}",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.yajra-datatable').DataTable().ajax.reload();
                            swal('Tress',"Copies Created Successfully",'success');
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

                    function viewCopy(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      $.ajax({
                          type:'get',
                          url:"{{route('copies.view')}}",
                          data:{id:id},
                          success: function(response){
                            $('#id').val(response.id);
                            $('#book_id').val(response.book_id);
                            $('#title').val(response.title);
                            $('#state').val(response.state);
                            if(response.availability==0){
                              $('#availability').val("No");
                            }
                            else{
                              $('#availability').val("Yes");
                            }

                            if(response.state==1){
                              $('#location_id').val("Torn");
                            }
                            else if(response.state==2){
                              $('#location_id').val("Intact");
                            }
                            else{
                              $('#location_id').val("Unknown");
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
                        $('#reg_form input').attr("readonly",true);
                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              registerCopy();
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
                             ajax: "{{ route('copies.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewCopy(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'id'},
                                 {data: 'book.title', name: 'book.title'},
                                 {data: 'book.subject_id', name: 'book.subject_id'},
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
