<!DOCTYPE html>

<html lang="en">

@section('htmlheader_title', 'Manage Room')
    @include('layouts.includes.htmlheader')
@show

@if(Auth::user()->status == 'User')
<body class="skin-green sidebar-mini">
@elseif(Auth::user()->status == 'Admin')
<body class="skin-blue sidebar-mini">
@else
<body class="skin-blue-light sidebar-mini">
@endif
<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @section('contentheader_title', 'Manage Room')
        @section('contentheader_message', 'Manage')        
        @include('layouts.partials.contentheader')
       
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Database Room</h3>
                   <a href="{{ url('room/create') }}" class="btn btn-success"><i class="fa fa-plus-square"></i> Add Room</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Room</th>
                      <th>Date</th>
                      <th>Keperluan</th>
                      <th>Status</th>
                      <th>Permission</th>
                      <th>Proposal Status</th>
                      <th>Proposal</th>
                      <th>Approve</th>
                      <th>Reject</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $a)       
                    <tr>
                      <td>{{ $a->id }}</td>
                      <td>{{ $a->pilihuser->name }}</td>
                      <td>{{ $a->pilihroom->room_name}}</td>
                      <td>{{ $a->event_date }}</td>
                      <td>{{ $a->keperluan }}</td>
                      <td>{{ $a->endstatus }}</td>
                     {{--  <td>{{ $a->proposal }}</td> --}}
                      <td>{{ $a->permission_status }}</td>
                      <td>{{ $a->proposal_status }}</td>
                       <td><a href="dokumen/{{ $a->proposal }}" download="{{ $a->proposal }}" class="btn btn-primary"><i class="fa  fa-cloud-download"> Download</i></a></td>
                      <td>
                          <form action="{{ url('givepermission/'.$a->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="proposal_status" class="form-control" value="Approved">
                            <center><button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i></button></center>
                          </form>
                      </td>
                      <td>
                          <form action="{{ url('givepermission/'.$a->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                             <input type="hidden" name="proposal_status" class="form-control" value="Rejected">
                            <center><button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button></center>
                          </form>
                      </td>
                     
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <th>ID</th>
                      <th>User</th>
                      <th>Room</th>
                      <th>Date</th>
                      <th>Keperluan</th>
                      <th>Status</th>
                      <th>Permission</th>
                      <th>Proposal Status</th>
                      <th>Proposal</th>
                      <th>Approve</th>
                      <th>Reject</th>
                    </tfoot>
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
    @include('layouts.partials.scripts_table')
    @include('layouts.partials.scripts_dataTable')

@show

</body>
</html>