@extends('main')

@section('content')
<div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
    	@if(session()->has('message'))
			    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px; width: 400px;">
				     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				     <strong> {{ session('message') }} </strong>
		  		</div>
		@endif

		@if(session()->has('error'))
			    <div class="alert alert-danger alert-dismissable custom-danger-box" style="margin: 15px; width: 400px;">
				     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				     <strong> {{ session('error') }} </strong>
		  		</div>
		@endif
    	<div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add Category  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <!--<form id="ShedulerForm" action="javascript:void(0)" enctype="multipart/form-data">-->

              	 <form  method="post" action="{{url('persons/update') }}"> 
				@csrf
                <div class="card-body">
                <div class="form-group">
                    <label > Name  * </label>
                     <input type="text" name="name" id="name" value="{{ $person->name }}"  class="form-control"  placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label >Phone Number   * </label>
                     <input type="text" name="phone" id="phone" value="{{ $person->phone }}"  class="form-control"  placeholder="" required>
                  </div>
                </div>
                 <input type="hidden" name="id" value="{{ $person->id }}" >
                <!-- /.card-body -->

                <div class="card-footer">
                  <button  class="btn btn-primary btn-submit" type="submit" >Submit</button>
                   
                  <a   class="btn btn-primary" id="cancelButton" href='{{ url("/") }}'>Cancel </a>
                </div>
              </form>
             
            </div>
            <!-- /.card -->

        </div>

<div class="container">

<script>
  $(function () {
    $('#datetimepicker1').datetimepicker();
 });
</script>

</div>
</section>

@endsection 