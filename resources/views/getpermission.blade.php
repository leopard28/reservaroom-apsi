<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader_title', 'Status')
    @include('layouts.includes.htmlheader')
@show

@if(Auth::user()->status == 'User')
<body class="skin-green sidebar-mini">
@else
<body class="skin-blue sidebar-mini">
@endif
<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @section('contentheader_title', 'Get Permission')
    @section('contentheader_message', 'Status')
        @include('layouts.partials.contentheader')
        
       <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Reservation List</h3>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>User</th>
                      <th>Room</th>
                      <th>Event</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>View Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $a)       
                    <tr>
                      <td>{{ $a->uname }}</td>
                      <td>{{ $a->rname}}</td>
                      <td>{{ $a->namerev }}</td>
                      <td>{{ $a->srev }}</td>
                      <td>{{ $a->erev }}</td>
                      <td><a href="{{ url('getpermission/'.$a->idrev) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>  
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->

    </div><!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    @include('layouts.includes.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('layouts.includes.scripts')
@show

</body>
</html>