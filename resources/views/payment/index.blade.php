@extends('layouts.frame')

@section('content')
<div id="resultPane">

        <div id="resultLinks">
          <table class="table table-bordered expenses-datatable table-sm table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Batch_no</th>
                            <th>Acc_date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Total</th>
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
                <div class="card-header">{{ __('Expenses') }}</div>

                <div class="card-body">
                    <form id="reg_form">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reference_No') }}</label>

                            <div class="col-md-6">
                                <input id="reference_no" type="text" class="form-control form-control-sm input-sm @error('reference_no') is-invalid @enderror" name="reference_no" value="{{ old('reference_no') }}" required autocomplete="reference_no" autofocus>

                                @error('reference_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Batch_No') }}</label>

                            <div class="col-md-6">
                                <input id="batch" type="text" class="form-control form-control-sm input-sm @error('batch') is-invalid @enderror" name="batch" value="{{ old('batch') }}" required autocomplete="batch" autofocus>

                                @error('batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

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
                            <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('Currency') }}</label>

                            <div class="col-md-6">
                                <input id="currency" type="text" class="form-control form-control-sm input-sm @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency') }}" required autocomplete="currency" autofocus>

                                @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control form-control-sm input-sm @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entity_to_bill" class="col-md-4 col-form-label text-md-right">{{ __('Entity_to_bill') }}</label>

                            <div class="col-md-6">
                              <select  name="entity_to_bill" id="entity_to_bill" class="form-select form-control form-control-sm">
                                  <option value="0">No Choice</option>
                                  <option value="1">All</option>
                                  <option value="2">Level</option>
                                  <option value="3">Class</option>
                                  <option value="4">Individual(s)</option>
                              </select>

                                @error('entity_to_bill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group_name" class="col-md-4 col-form-label text-md-right">{{ __('Entity_Name') }}</label>

                            <div class="col-md-6">
                                <input id="entity_name" type="text" class="form-control form-control-sm input-sm @error('entity_name') is-invalid @enderror" name="entity_name" value="{{ old('entity_name') }}" required autocomplete="entity_name" autofocus>

                                @error('entity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Accounting Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control form-control-sm input-sm @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="type" type="hidden" class="form-control form-control-sm input-sm @error('type') is-invalid @enderror" name="type" value="{{'0'}}" >
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-inline btn-sm" id="submit" disabled="true">
                                    {{ __('Submit') }}
                                </button>&nbsp;&nbsp;
                                <button  class="btn btn-secondary btn-inline btn-sm" id="edit">
                                    {{ __('Edit') }}
                                </button>&nbsp;&nbsp;
                                <button class="btn btn-primary btn-inline btn-sm" id="new">
                                    {{ __('New') }}
                                </button>

                                <button class="btn  btn-outline-danger btn-inline btn-sm" id="reverse">
                                  {{ __('Undo') }}
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                                  </svg>
                                </button>
                                <!--<label  class="col-md-4 col-form-label text-md-right">{{ __('Processing . . .') }}</label>-->
                            </div>

                        </div>

                    </form>


                    <script>
                    var new_entry = false;
                    function createExpense(){
                      $.ajax({
                          type:'post',
                          url:'{{ route("payment.create")}}',
                          data:$('form').serialize(),
                          success: function(response){
                            $('#batch').val(response.id);
                            $('.expenses-datatable').DataTable().ajax.reload();
                            swal('Tress',"Payment(s) Captured Successfully",'success');
                          },
                          error: function(resp){
                            alert(resp.msg);
                            //swal('Tress',resp.msg,'error');
                          }
                      });
                    }

                    function updateExpense(){
                      $.ajax({
                          type:'post',
                          url:"/update_student",
                          data:$('form').serialize(),
                          success: function(response){
                            $('.expenses-datatable').DataTable().ajax.reload();
                            swal('Tress','Student Edited Successfully','success');
                          },
                          error: function(resp){
                            swal('Tress',resp.msg,'error');
                          }
                      });
                    }

                    function deleteExpense(event){
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
                                url: '{{route("payment.deleteBatch")}}',
                                data:{id:id},
                                success: function(response){
                                  $('.expenses-datatable').DataTable().ajax.reload();
                                  swal('Tress',"Batch Deleted Successfully",'success');
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


                    function viewExpense(event){
                      event.preventDefault();
                      var id = $(event.target).text();
                      //var id = $(event.target).parent().siblings(":first").nextAll().eq(1).html();
                      $.ajax({
                          type:'get',
                          url:'{{route("expense.view")}}',
                          data:{id:id},
                          success: function(response){
                            //console.log(response);
                            $('#reference_no').val(response.reference_no);
                            $('#batch').val(response.id);
                            $('#description').val(response.description);
                            $('#currency').val(response.currency);
                            $('#amount').val(response.act_amount);
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

                    function reverseTransaction(event){
                      event.preventDefault();
                      let id = $('#batch').val();
                      const description = window.prompt("Enter reversal descrition");
                    //  console.log(val);
                      $.ajax({
                          type:'post',
                          url: "{{route('expense.reverse')}}",
                          data:{"_token": "{{ csrf_token() }}",id:id,description:description },
                          success: function(response){

                            $('#reference_no').val(response.reference_no);
                            $('#batch').val(response.id);
                            $('#description').val(response.description);
                            $('#currency').val(response.currency);
                            $('#amount').val(response.act_amount);
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

                        $('#submit').click(function(event){
                            event.preventDefault();
                            if(new_entry){
                              createExpense();
                            }
                            else{
                              updateExpense();
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

                        $('#reverse').click(function(event){
                            event.preventDefault();
                            reverseTransaction(event);
                        });

                        $('#reg_form input').change(function(){
                            $('#submit').attr("disabled",false);
                        });

                        $(function () {

                         var table = $('.expenses-datatable').DataTable({
                             processing: true,
                             serverSide: true,
                             ajax: "{{ route('expense.list') }}",
                             columns: [
                                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                 {data: function(row){
                                   return '<a href="#" onClick="viewExpense(event)" style="color:black">'+row.id+'</a>';
                                 }, name: 'batch_no'},
                                 {data: 'date', name: 'date'},
                                 {data: function(row){
                                   if(row.type==0){
                                     return "Debit";
                                   }
                                   return "Credit";
                                 }, name: 'type'},
                                 {data: 'loc_amount', name: 'loc_amount'},
                                 {data: 'loc_total', name: 'loc_total'},
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
