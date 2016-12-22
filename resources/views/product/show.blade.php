@extends('layout.master_admin')

@section('title','Product')
@section('css')
 <!-- Datatables -->
 <link href="{{ URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{ URL::asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('vendors/alertify/css/alertify.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('vendors/alertify/css/default.min.css')}}" rel="stylesheet">
@endsection
@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
      <h2>Data Product</h2>
                    
      <div class="clearfix">
				<a href="{{url('/product/addproduct')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
			</div>
  </div>
  <div class="x_content">
				  
  <!--table-->
    <table id="datatable-product" class="table table-striped table-bordered dt-responsive nowrap" data-page-length='25'>
      <colgroup>
        	<col/>
        	<col/>
        	<col/>
        	<col/>
        	<col style="width:100px;"/>
	   </colgroup>
	<thead>
        <tr>
          <th>Merk</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Harga</th>
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
    <script src="{{ URL::asset('vendors/alertify/js/alertify.min.js')}}"></script>

    <script type='text/javascript'>
    var gentable=null;
		$(document).ready(function(){
			gentable = $('#datatable-product').DataTable({
          processing: true,
          order:[[0,'asc']],
          ajax: '{{url("/product/getDataProduct")}}',
          columns: [
              {data: 'relasi_merek[0].merek', name: 'relasi_merek[0].merek'},
              {data: 'kode_produk', name: 'kode_produk'},
              {data: 'nama_produk', name: 'nama_produk'},
              {data: 'harga', name: 'harga',"className": "text-right"},
              {
              "className": "action text-center",
              "data": null,
              "bSortable": false,
              "defaultContent": "" +
              "<div class='btn-group' role='group'>" +
               " <button class='list btn btn-success btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='left' title='Detail'><i class='fa fa-list'></i></button>" +
              "  <button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>" +
              "<button type=\"button\" class=\"btn btn-success btn-xs detail\" rel='tooltip' data-toggle='tooltip' data-placement='right' title='Detail'><i class='fa fa-list'></i>" +
              "<span class=\"sr-only\">Action</span></button>" +
              "</div>"
            }
          ],
           drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="3">'+group+'</td></tr>'
                );
                last = group;
              }
            });
           
             
        },

        columnDefs: [
            { "visible": false, "targets": 0 }
          ],
      });

     var sbody = $('#datatable-product tbody');
      sbody.on('click','.list', function(){
        var data = gentable.row($(this).parents('tr')).data();
        if(data===undefined){
          data = gentable.row($(this).closest('tr').prev()).data();
        }
        window.location.href='/product/detail/'+data.id;
      }).
      on('click','.delete',function(){
        var data = gentable.row($(this).parents('tr')).data();
         if(data===undefined){
          data = gentable.row($(this).closest('tr').prev()).data();
        }
        alertify.confirm("Konfirmasi","Anda Yakin Ingin menghapus data?", function (e) {
          if (e) {
            $.get("/product/delete/"+data.id, function(data, status){
              //alert(data)
                if(parseInt(data.return)==1){
                  alertify.success('Data berhasil dihapus');
                  gentable.ajax.reload();
                }else{
                  alertify.error('Gagal menghapus');
                }
                
            },'json');
          }
        },function(){});   
      });
      //tooltip
      $('body').tooltip({
        selector: '[rel=tooltip]'
      });

		});

   </script>
@endsection
