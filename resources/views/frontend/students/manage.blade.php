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

              @if ( $students->count() === 0 )
                  <div>nothing here</div>
              @else
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
                      @foreach ($students as $row => $student)
                        <tr>
                          <td>{{  $row + 1 }}</td>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->email }}</td>
                          <td>
                             <a href="" class="btn btn-success updateData" 
                             data-bs-toggle="modal" 
                             data-bs-target="#editModal"
                             data-id="{{ $student->id }}"
                             data-name="{{ $student->name }}"
                             data-email="{{ $student->email }}"
                             >edit</a>

                             <button type="button" 
                             class="btn btn-danger deleteData"
                             data-id="{{ $student->id }}"
                             >Delete</button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              @endif

              <!-- Modal -->
              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add Modal</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="updateForm">

                          <input type="hidden" id="student_id" />
                  
                          <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="up_name">
                          </div>
              
                          <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="up_email">
                          </div>
              
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="update_student">Submit</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
             
              <!-- Modal -->
              <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add Modal</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="addForm">
                  
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
                             <button type="submit" class="btn btn-primary" id="add_student">Submit</button>
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
         $(document).on("click", '#add_student', function(e){
           e.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();

            let data ={ name, email };
            console.log(data);

            $.ajax({
               url: "{{ route('student.store') }}",
               data: data,
               method: "POST",
               data: data,
               success: function( res ){
                   if( res.status === 'success' ){
                    $('#addModal').modal('hide');
                    $('.addForm')[0].reset();
                    $('.table').load(location.href+' .table');
                   }
               },
               error: function(err){
                 console.log(err);
               }
            })
         })

         $(document).on("click", '.updateData', function(){
            let id    = $(this).data('id');
            let name  = $(this).data('name');
            let email = $(this).data('email');

            $('#student_id').val(id);
            $('#up_name').val(name);
            $('#up_email').val(email);
            console.log(id, name, email);
        })


        $(document).on("click", '#update_student', function(e){
           e.preventDefault();

            var id     = $('#student_id').val();
            var name   = $('#up_name').val();
            var email  = $('#up_email').val();

            let data ={ id, name, email };
            console.log(data);

            $.ajax({
               url: "{{ route('student.update') }}",
               data: data,
               method: "POST",
               data: data,
               success: function( res ){
                   if( res.status === 'success' ){
                    $('#editModal').modal('hide');
                    $('.updateForm')[0].reset();
                    $('.table').load(location.href+' .table');
                   }
               },
               error: function(err){
                 console.log(err);
               }
            })
         })

         $(document).on("click", '.deleteData', function(){
             var student_id = $(this).data('id');

             $.ajax({
               url: "{{ route('student.delete') }}",
               method: "POST",
               data: { student_id : student_id },
               success: function( res ){
                   if( res.status === 'success' ){
                      $('.table').load(location.href+' .table');
                   }
               },
               error: function(err){
                 console.log(err);
               }
            })
         })

      })
    </script>
@endsection