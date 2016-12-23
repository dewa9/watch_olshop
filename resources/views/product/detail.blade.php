 @extends('layout.master_admin')
 @section('title','Product')
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Siswa</h3>
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
                    <h2><small>Detail Produk</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      @foreach($datadetail as $key=>$details)
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <table class="table table-hover">
                      <thead>
                      <tr>
                        <th>Merk </th><th>{{$details->relasi_merek[0]->merek}}</th>
                        
                      </tr>
                      <tr>
                        <th>Model </th><th>{{$details->kode_produk}}</th>
                      </tr>
                      <tr>
                        <th>Nama Produk </th><th>{{$details->nama_produk}}</th>
                      </tr>
                      
                      <tr>
                        <th>Harga </th><th>{{$details->harga}}</th>
                      </tr>
                      <tr>
                        <th>Deskripsi </th><th>{{$details->deskripsi}}</th>
                      </tr>
                      
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <img class="img-rounded" id="image-product" style="max-width: 100%;" src="data:image/jpg;base64,{{$details->gambar1 }}" alt="produk">
					<br/>
					<!--img small-->
					<a href="#" class="klik-image">
					<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar1 }}" alt="produk-small">
					</a>
					<a href="#" class="klik-image">
					<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar2 }}" alt="produk-small">
					</a>
					<a href="#" class="klik-image">
					<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar3 }}" alt="produk-small">
					</a>
					<!-- -->
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
                        <th>Movement </th><th>{{$details->relasi_spesifikasi[0]->movement}}</th>
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
 <script src="{{ URL::asset('js/blowup.min.js')}}"></script>
 <script type="text/javascript">
    $(document).ready(function(){
         
		 $('.klik-image').click(function(){
			 var a=$(this).find('img').attr('src');
			 $('#image-product').removeAttr('src').attr('src',a);
			 $("#image-product").blowup();
		 });
		 $("#image-product").blowup();
    });
 </script>
@endsection