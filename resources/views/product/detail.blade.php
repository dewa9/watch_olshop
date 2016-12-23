 @extends('layout.master_admin')
 @section('title','Product')
 @section('css')
<link href="{{ URL::asset('css/bootstrap-editable.css')}}" rel="stylesheet">
 @endsection
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail Produk</h3>
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
             <div class="clearfix">
                
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Detail Produk</small></h2>
                    
                    <div class="clearfix">
                      <a href="#" id="editable-click" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      @foreach($datadetail as $key=>$details)
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <table class="table table-hover">
                      <thead>
                      <tr>
                        <th>Merk </th>
                        <th>
                            <a href="#" class="editable-produk" id="id_merek" data-type="select" data-pk="{{$details->id}}" 
                              data-url="/product/update" data-title="Merk">
                              {{$details->relasi_merek[0]->merek}}
                            </a>
                        </th>
                      </tr>
                      <tr>
                        <th>Model </th><th><a href="#" class="editable-produk" id="kode_produk" data-type="text" data-pk="{{$details->id}}" 
                              data-url="/product/update" data-title="Kode Produk">
                              {{$details->kode_produk}}
                            </a>
                            </th>
                      </tr>
                      <tr>
                        <th>Nama Produk </th>
                        <th>
                        <a href="#" class="editable-produk" id="nama_produk" data-type="text" data-pk="{{$details->id}}" 
                              data-url="/product/update" data-title="Nama Produk">
                              {{$details->nama_produk}}
                            </a>
                          </th>
                      </tr>
                      
                      <tr>
                        <th>Harga </th><th>
                        <a href="#" class="editable-produk" id="harga" data-type="number" data-pk="{{$details->id}}" 
                              data-url="/product/update" data-title="Harga">
                              {{$details->harga}}

                            </a>
                          </th>
                      </tr>
                      <tr>
                        <th>Deskripsi </th><th><a href="#" class="editable-produk" id="deskripsi" data-type="text" 
                        data-pk="{{$details->id}}" data-url="/product/update" data-title="Deskripsi">
                              {{$details->deskripsi}}
                            </a>
                          </th>
                      </tr>
                      
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <img class="img-rounded" id="image-product" style="max-width: 100%;" src="data:image/jpg;base64,{{$details->gambar1 }}" alt="produk">
                  </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <table class="table table-hover">
                        <tr>
                        <th><h2>Spesifikasi</h2></th>
                      </tr>
                       <tr>
                        <th>Series </th><th>{{$details->deskripsi}}</th>
                      </tr>
                        <tr>
                          @if($details->relasi_spesifikasi[0]->gender===1)
                        <th>Gender </th><th>Laki-laki (Men)</th>
                        @else
                        <th>Gender </th><th>Perempuan (Women)</th>
                        @endif
                      </tr>
                      <tr>
                        <th>Movement </th>
                          <th>
                            <a href="#" class="editable-spesification" id="movement" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Movement">
                          {{$details->relasi_spesifikasi[0]->movement}}</a>

                          </th>
                      </tr>
                       <tr>
                        <th>Case Diameter </th><th>{{$details->relasi_spesifikasi[0]->movement}}</th>
                      </tr>
                       <tr>
                        <th>Case Thickness </th><th>{{$details->relasi_spesifikasi[0]->movement}}</th>
                      </tr>
                       <tr>
                        <th>Case Material </th><th>{{$details->relasi_spesifikasi[0]->case_material}}</th>
                      </tr>
                       <tr>
                        <th>Case Back </th><th>{{$details->relasi_spesifikasi[0]->case_back}}</th>
                      </tr>
                       <tr>
                        <th>Glass Material </th><th>{{$details->relasi_spesifikasi[0]->glass_material}}</th>
                      </tr>
                       <tr>
                        <th>Strap Material </th><th>{{$details->relasi_spesifikasi[0]->strap_material}}</th>
                      </tr>
                      <tr>
                        <th>Clasp </th><th>{{$details->relasi_spesifikasi[0]->clasp}}</th>
                      </tr>
                      </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <table class="table table-hover">
                        
                       <tr>
                        <th>Calendar </th><th>{{$details->deskripsi}}</th>
                      </tr>
                        
                      <tr>
                        <th>Driving System </th><th>{{$details->relasi_spesifikasi[0]->driving_system}}</th>
                      </tr>
                      <tr>
                        <th>Caliber Number </th><th>{{$details->relasi_spesifikasi[0]->caliber_number}}</th>
                      </tr>
                      <tr>
                        <th>Case </th><th>{{$details->relasi_spesifikasi[0]->case}}</th>
                      </tr>
                       <tr>
                        <th>Case Coating</th><th>{{$details->relasi_spesifikasi[0]->case_coating}}</th>
                      </tr>
                      <tr>
                        <th>Lumbright</th><th>{{$details->relasi_spesifikasi[0]->lumbright}}</th>
                      </tr>
                      <tr>
                        <th>Accuracy</th><th>{{$details->relasi_spesifikasi[0]->accuracy}}</th>
                      </tr>
                       <tr>
                        <th>Magnetic Reductance</th><th>{{$details->relasi_spesifikasi[0]->magnetic_reductance}}</th>
                      </tr>
                      <tr>
                        <th>Luminious/Lumibrite</th><th>{{$details->relasi_spesifikasi[0]->luminious_lumibrite}}</th>
                      </tr>
                       <tr>
                        <th>Dial Color</th><th>{{$details->relasi_spesifikasi[0]->dial_color}}</th>
                      </tr>
                       <tr>
                        <th>Features </th><th>{{$details->relasi_spesifikasi[0]->features}}</th>
                      </tr>

                      <tr>
                        <th>Weight After Packing </th><th>{{$details->relasi_spesifikasi[0]->weight_after_packing}}</th>
                      </tr>
                       <tr>
                        <th>Inside Box </th><th>{{$details->relasi_spesifikasi[0]->inside_box}}</th>
                      </tr>
                      </table>
                    </div>
                      @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
 <script src="{{ URL::asset('js/bootstrap-editable.min.js')}}"></script>
 <script src="{{ URL::asset('js/blowup.min.js')}}"></script>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script type="text/javascript">
 var _fnmereksource = function()
 {
  var _arr =[];
  var _urlsource = '/merek/populate_select';
  $.ajax({
      type:'GET',
      async:true,
      url:_urlsource,
      dataType:'json',
      success:function(data){
        console.log(data);
        $('#id_merek').attr('data-source',data);
      }
  });
 }
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
         $("#image-product").blowup();

         //
         $.fn.editable.defaults.send = "always";
         $('#editable-click').click(function(){
            $('.editable-produk,.editable-spesification').editable('toggleDisabled');
          
         });
         _fnmereksource();
    });
 </script>
@endsection