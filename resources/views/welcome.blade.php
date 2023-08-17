@extends('main')

@section('content')

<div style="margin:  50px ;"> 
            <a class="btn btn-success" href='{{url("persons/create")}}'> Add Person  </a>
        </div>
    <div style="margin:  50px ;" >
        <table class="table table-striped">
            <tr  class="card-header" >
                <th>Seriel Number </th>
                <th>Name</th>
                <th>Phone Number </th>
                <th>Action </th>
            </tr>
            <?php $i=0; ?>
            @foreach($data as $c)
            <?php $i+=1; ?>
            <tr>
                <td>{{ $c->id  }} </td>
                <td>{{ $c->name }} </td>
                <td>{{ $c->phone  }} </td>
                <td> <a class="btn btn-warning" href='{{url("persons/edit/$c->id")}}'> Edit </a>
                <a class="btn btn-danger" href='{{url("persons/delete/$c->id")}}'> Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection