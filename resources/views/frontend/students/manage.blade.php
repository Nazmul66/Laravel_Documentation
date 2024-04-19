@extends('layout')

@section('body')
    <section style="margin-top: 80px;">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
              <h1 class="text-center mb-3">All Student</h1>
             @if ( $allStudent->count() == 0 )
                <div class="alert bg-info text-center">oop! no student found in our system</div>
             @else()
             <table class="table table-striped table-info">
                <thead>
                  <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                     @php  $sl = 1;  @endphp
                    @foreach ($allStudent as $std)

                      <tr>
                        <th scope="row">{{ $sl }}</th>
                        <td>{{ $std->name }}</td>
                        <td>{{ $std->email }}</td>
                        <td>
                          <a href="{{ route('student.edit', $std->id) }}" class="btn btn-primary">Update</a>
                          <button data-bs-toggle="modal" data-bs-target="#std{{ $std->id }}" class="btn btn-danger">Delete</button>
                        </td>
                      </tr>

                      <!-- Modal -->
                      <div class="modal fade" id="std{{ $std->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Do you want to delete this Student data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              {{-- <form method="POST" action={{ route('student.delete', $std->id) }}> --}}
                                <div class="modal-body d-flex justify-content-center mb-3 mt-3">
                                   <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> 
                                   <a href="{{ route('student.delete', $std->id) }}" class="btn btn-danger ms-3">Confirm</a>
                                </div>
                              {{-- </form> --}}
                          </div>
                        </div>
                    </div>
                    <!-- Modal -->
                     
                     @php  $sl++;  @endphp
                    @endforeach 

                  @endif

                </tbody>
              </table>
           </div>
         </div>
       </div> 
    </section>
@endsection