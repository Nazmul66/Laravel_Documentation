@extends('layout')

@section('body')
    <section style="margin-top: 80px;">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
              <div class="d-flex justify-content-between mb-3">
                 <h3 class="mb-0">All Student</h3>
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
              </div>

             <table class="table table-striped table-info" id="ytables">
                <thead>
                  <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>


              <!-- Modal -->
              <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add Modal</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('student.store') }}">
                         
                           @csrf
                         
                           <div class="mb-3">
                             <label for="name" class="form-label">Full Name</label>
                             <input type="text" class="form-control" name="name" id="name">
                           </div>
               
                           <div class="mb-3">
                             <label for="email" class="form-label">Email address</label>
                             <input type="email" class="form-control" name="email" id="email">
                           </div>
               
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

           </div>
         </div>
       </div> 
    </section>
@endsection



@section('scripts')
    <script>
      $(document).ready(function(){
         $('#ytables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.manage') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action', orderable: true, searchable: true},
                ]
            });
      })
    </script>
@endsection