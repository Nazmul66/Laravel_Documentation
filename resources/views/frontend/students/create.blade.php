@extends('layout')


@section('body')
 <section style="margin-top: 80px;">
    <div class="container">
        <div class="row">
           <div class="col-lg-8 offset-lg-2">
               <form method="POST" action="{{ route('student.store') }}">
                
                  @csrf
                
                  <div class="mb-3">
                    <label for="name" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
      
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
      
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </div>
        </div>
    </div>
 </section>
@endsection