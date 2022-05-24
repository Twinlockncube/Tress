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
                <div class="card-header">{{ __('Parent/Guardian') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('guardian') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                          <label for="girl" class="col-md-4 col-form-label text-md-right">{{ __('Female') }}</label>
                            <div class="col-md-6">
                                <input id="girl" type="radio"  name="gender" value="{{ __(0) }}" >
                          <label for="boy" class="col-md-4 col-form-label text-md-right">{{ __('Male') }}</label>
                                <input id="boy" type="radio"  name="gender" value="{{ __(1) }}">
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('birth') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ID Number" class="col-md-4 col-form-label text-md-right">{{ __('National ID No') }}</label>

                            <div class="col-md-6">
                                <input id="nid" type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" required autocomplete="nid" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary" id="hide">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>


    var new_entry = false;
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

    function deleteGuardian(event){
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
                url: "/delete_guardian",
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

    function viewGuardian(event){
      event.preventDefault();
      var id = $(event.target).text();
      //var id = $(event.target).parent().siblings(":first").nextAll().eq(0).html();
      $.ajax({
          type:'get',
          url:"{{route('view_guardian')}}",
          data:{id:id},
          success: function(response){
            console.log(response);
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
            $('#email').val(response.email);
            $('#contact').val(response.contact_no);
            $('#nid').val(response.nid);

            //$('#reg_form input').attr("readonly",true);
            $('#submit').attr("disabled",true);
          },
          error: function(resp){
            alert(resp.msg);
          }
      });
      return false;
    }



        $(document).ready(function(){

          $(function () {
           var table = $('.yajra-datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('guardians/list') }}",
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: function(row){
                     return '<a href="#" onClick="viewGuardian(event)" style="color:black">'+row.id+'</a>';
                   }, name: 'id'},
                   {data: 'name', name: 'name'},
                   {data: 'last_name', name: 'last_name'},
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
@endsection
