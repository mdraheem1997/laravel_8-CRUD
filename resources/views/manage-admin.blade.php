@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                        <script>
                         setTimeout(function(){
       location.reload();
   },3000);
                        </script>
                        @endif
            <div class="card">
                <div class="card-header">{{ __('Admin List') }}
                    <a href="{{ url('/add-admin')}}" class="btn btn-success float-right">Add New</a>
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr> 
                                                          
                            </thead>
                            <tbody>
                            <?php 
                            $i=0;
                            ?>
                            @foreach($admin as $data)
                            <?php $i++;?>
                            
                                <tr>
                                    <td>{{$i}}</td> 
                                    <td>{{$data['name']}}</td> 
                                    <td>{{$data['username']}}</td>
                                    <td>
                                        <a href="/edit-admin/.{{base64_encode($data['id'])}}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit">&nbsp;</i></a>
                                        <a href="{{'/delete/'.base64_encode($data['id'])}}" onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash">&nbsp;</i></a>
                                    </td>                            
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable(
        {     
            dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
            
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5


        }
    );

    
} );


   </script>
@endsection

<?php /*
<!DOCTYPE html>
<html lang="en">
@include('header')

<style>
.w-5{
    display: none;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                        <script>
                         setTimeout(function(){
       location.reload();
   },3000);
                        </script>
                        @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Admin List
                        <a href="/add-admin" class="btn btn-success float-right">Add New</a>
                        </h3>
                        
                    </div>
                    <div class="card-body">
                        
                        <?php 
                        //$admin->links('pagination::bootstrap-4')
                    ?>
                        </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
   <script>
    $(document).ready( function () {
    $('#myTable').DataTable(
        {     
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5
                }
    );

    
} );


   </script>
</body>
</html>
*/?>