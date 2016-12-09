 @extends('layout.master_admin')
 @section('title','Merk')
 @section('css')
  <!-- Datatables -->
 <link href="{{ URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{ URL::asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
 @endsection
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Merk Jam Tangan</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Tambah Data Merk</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      <form action="{{url('/merk/storemerk')}}" method="post" class="form-horizontal form-label-left" id="form-merk">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Merk Jam Tangan 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         
                          <input class="form-control col-md-7 col-xs-12"  id="merk" name="merek"  required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Data Merk</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      <!--table-->
          <table id="datatable-merk" class="table table-striped table-bordered dt-responsive nowrap" data-page-length='25'>
             <thead>
                <tr>
                  <th></th>
                  <th>Merk</th>
                  <th></th>
                </tr>
              </thead>
          </table>
          <!--endtable-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
<!-- Datatables -->
    <script src="{{ URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>

<script src="{{ URL::asset('vendor/jsvalidation/js/jsvalidation.min.js')}}" type='text/javascript'></script>
{!! JsValidator::formRequest('App\Http\Requests\MerkRequest', '#form-merk') !!}
<script type="text/javascript">
  var notify=null;
  var gentable = null;
  $(document).ready(function(){
      //datatable
      gentable = $('#datatable-merk').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{url("/merk/getDataMerk")}}',
          columns:[
                 { data: 'id',name: 'id','className':'text-right'},
                { data: 'merek',name: 'merek'},
                {
                  "className": "action text-center",
                  "data": null,
                  "bSortable": false,
                  "defaultContent": "" +
                  "<div class='btn-group' role='group'>" +
                  "  <button class='edit  btn btn-primary btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit'></i></button>" +
                  "  <button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>" +
                  "<button type=\"button\" class=\"btn btn-success btn-xs detail\" rel='tooltip' data-toggle='tooltip' data-placement='right' title='Detail'><i class='fa fa-list'></i>" +
                  "<span class=\"sr-only\">Action</span></button>" +
                  "</div>"
            }
          ],
          "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
        "order": [[ 1, 'asc' ]]
      });
       gentable.on( 'order.dt search.dt', function () {
              gentable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                  cell.innerHTML = i+1;
              } );
          } ).draw();

      //form
      $('#form-merk').submit(function(e){
          e.preventDefault();
          $('#send').button('loading');
          var _datasend=$(this).serialize();
          $('#form-merk input').attr("disabled", "disabled");
          
          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: _datasend,
            dataType: 'json',
            beforeSend:function(){
              notify=$.notify('<strong>Sending</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                        });
            },
            success:function(data){
              if(parseInt(data.return)==1)
              {
                $('#form-merk').trigger('reset');
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                  }, 2000);
                  
              }
            },
            error:function(xhr,status,errormessage)
            {
              setTimeout(function() {
                    notify.update({'type': 'danger', 'message': '<strong>Failed</strong> ! ', 'progress': 25});
                  });
            },
            complete:function()
            {
              $('#form-merk input').removeAttr('disabled').trigger('reset');
              $('.form-group').removeClass('has-success');
              $('#send').button('reset');
            }
          });
      });
  });
</script>
@endsection