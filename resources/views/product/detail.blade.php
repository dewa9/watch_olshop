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
					  {{ $details }}
                      <div class="col-md-8 col-sm-8 col-xs-8">
					  <!--form image-->
						<form  action="{{url('/product/storeimage')}}" method="post" enctype='multipart/form-data' class="form-horizontal form-label-left" id="form-image" style="display:none;">
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" id="produk-id" name="id-produks" value="{{$details->id}}">
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">Upload Image
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             <span class="input-group-addon">Gambar I</span>
                             {!! Form::file('gambar1',array('class'=>'form-control col-md-7 col-xs-12 image_product')) !!}
                          </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             <span class="input-group-addon">Gambar II</span>
                              
							  {!! Form::file('gambar2',array('class'=>'form-control col-md-7 col-xs-12 image_product')) !!}
                          </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             
                             <span class="input-group-addon">Gambar III</span>
							 
							  {!! Form::file('gambar3',array('class'=>'form-control col-md-7 col-xs-12 image_product')) !!}
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send-image" type="submit" class="btn btn-success">Send</button>
						   <button id="cancel-image" type="button" class="btn btn-default">Cancel</button>
                        </div>
                      </div>
                    </form>
					  <!-- -->
                        <table class="table table-hover" id="table-detailproduk">
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
				  <div id="temp-image" style="display:none;">
					 <img class=" img-rounded" style="max-width: 70%;" id="image_show" src="{{ URL::asset('images/user.png')}}" alt="profil-picture" >
                       
				  </div>
				  <div id="detail-image">
                    <img class="img-rounded" id="image-product" style="max-width: 100%;" src="data:image/jpg;base64,{{$details->gambar1 }}" alt="produk">
					<p/>
					<!--img small-->
					<div class="">
						<a href="#" class="klik-image">
							<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar1 }}" alt="produk-small">
						</a>
						<a href="#" class="klik-image">
							<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar2 }}" alt="produk-small">
						</a>
						<a href="#" class="klik-image">
							<img class="img-rounded"  style="max-width: 10%;" src="data:image/jpg;base64,{{$details->gambar3 }}" alt="produk-small">
						</a>
						<div class="pull-right">
							<button type="button" id="change-image" class="btn btn-default btn-xs" rel='tooltip' data-toggle='tooltip' data-placement='left' title='Ganti Gambar'><i class="fa fa-upload"></i></button>
						</div>
					</div>
					<!-- -->
					</div>
                  </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <table class="table table-hover">
                        <tr>
                        <th><h2>Spesifikasi</h2></th>
                      </tr>
                       <tr>
                        <th>Series </th><th>{{$details->relasi_spesifikasi[0]->series}}</th>
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
                        <th>Case Diameter </th><th>
						<a href="#" class="editable-spesification" id="case_diameter" data-type="number" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Case Diameter">{{$details->relasi_spesifikasi[0]->case_diameter}}
							 </a></th>
                      </tr>
                       <tr>
                        <th>Case Thickness </th><th>
						<a href="#" class="editable-spesification" id="case_thickness" data-type="number" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Case Thickness">
							  {{$details->relasi_spesifikasi[0]->case_thickness}}
							  </a></th>
                      </tr>
                       <tr>
                        <th>Case Material </th><th><a href="#" class="editable-spesification" id="case_material" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Case Material">{{$details->relasi_spesifikasi[0]->case_material}}
							  </a></th>
                      </tr>
                       <tr>
                        <th>Case Back </th><th><a href="#" class="editable-spesification" id="case_back" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Case Back">{{$details->relasi_spesifikasi[0]->case_back}}
							  </a></th>
                      </tr>
                       <tr>
                        <th>Glass Material </th><th><a href="#" class="editable-spesification" id="glass_material" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Glass Material">{{$details->relasi_spesifikasi[0]->glass_material}}
							  </a></th>
                      </tr>
                       <tr>
                        <th>Strap Material </th>
						<th><a href="#" class="editable-spesification" id="strap_material" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Strap Material">{{$details->relasi_spesifikasi[0]->strap_material}}
							  <a/></th>
                      </tr>
                      <tr>
                        <th>Clasp </th><th>
						<a href="#" class="editable-spesification" id="clasp" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Clasp">{{$details->relasi_spesifikasi[0]->clasp}}</a></th>
                      </tr>
                      </table>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <table class="table table-hover">
                        
                       <tr>
                        <th>Calendar </th><th><a href="#" class="editable-spesification" id="calendar" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Calendar">{{$details->relasi_spesifikasi[0]->calendar}}</a></th>
                      </tr>
                        
                      <tr>
                        <th>Driving System </th><th><a href="#" class="editable-spesification" id="driving_system" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Driving System">{{$details->relasi_spesifikasi[0]->driving_system}}
							  </a></th>
                      </tr>
                      <tr>
                        <th>Caliber Number </th><th><a href="#" class="editable-spesification" id="caliber_number" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Caliber Number">{{$details->relasi_spesifikasi[0]->caliber_number}}</a>
							  </th>
                      </tr>
                       <tr>
                        <th>Case Coating</th><th><a href="#" class="editable-spesification" id="case_coating" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Case Coating">{{$details->relasi_spesifikasi[0]->case_coating}}
							  </a></th>
                      </tr>
                      <tr>
                        <th>Lumibright</th><th><a href="#" class="editable-spesification" id="lumibright" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Lumbright">{{$details->relasi_spesifikasi[0]->lumibright}}</a></th>
                      </tr>
                      <tr>
                        <th>Accuracy</th><th><a href="#" class="editable-spesification" id="accuracy" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Accuracy">{{$details->relasi_spesifikasi[0]->accuracy}}</a></th>
                      </tr>
                       <tr>
                        <th>Magnetic Reluctance</th><th><a href="#" class="editable-spesification" id="magnetic_reluctance" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Magnetic Reluctance">{{$details->relasi_spesifikasi[0]->magnetic_reluctance}}</a></th>
                      </tr>
                      <tr>
                        <th>Luminious/Lumibrite</th><th><a href="#" class="editable-spesification" id="luminious_lumibrite" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Luminious/Lumibrite">{{$details->relasi_spesifikasi[0]->luminious_lumibrite}}</a></th>
                      </tr>
                       <tr>
                        <th>Dial Color</th><th><a href="#" class="editable-spesification" id="dial_color" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Dial Color">{{$details->relasi_spesifikasi[0]->dial_color}}</a></th>
                      </tr>
                       <tr>
                        <th>Features </th><th><a href="#" class="editable-spesification" id="features" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Features">{{$details->relasi_spesifikasi[0]->features}}</a></th>
                      </tr>

                      <tr>
                        <th>Weight After Packing </th><th><a href="#" class="editable-spesification" id="weight_after_packing" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Weight After Packing">{{$details->relasi_spesifikasi[0]->weight_after_packing}}</a></th>
                      </tr>
                       <tr>
                        <th>Inside Box </th><th><a href="#" class="editable-spesification" id="inside_box" data-type="text" data-pk="{{$details->relasi_spesifikasi[0]->id}}" 
                              data-url="/spesification/update" data-title="Inside Box">{{$details->relasi_spesifikasi[0]->inside_box}}</a></th>
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
  function readURL(input) {
        var a=$(input)[0].files;
        
        if (a) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_show').attr('src', e.target.result);
            }
            reader.readAsDataURL($(input)[0].files[0]);
        }
    }
 
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
        $('#id_merek').attr('data-source',data);
      }
  });
 }
    $(document).ready(function(){

         
		 $('.klik-image').click(function(){
			 var a=$(this).find('img').attr('src');
			 $('#image-product').removeAttr('src').attr('src',a);
			 $("#image-product").blowup();
		 });
		 $("#image-product").blowup();

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
		 
		 $('body').tooltip({
			selector: '[rel=tooltip]'
		});
		
		$('#change-image').click(function(){
			$('#detail-image').hide('fast');
			$('#table-detailproduk').hide('slow');
			$('#form-image').show('fast');
		});
		
		$('#cancel-image').click(function(){
			$('#table-detailproduk').show('fast');
			$('#detail-image').show('fast');
			$('#form-image').trigger('reset').hide('slow');
			
			$('#temp-image').hide('fast');
			//$('#image_show').removeAttr('src');
			
		});
		
		  $('.image_product').change(function(){
			 $('#temp-image').show('fast');
            readURL($(this));
           
        });
    });
 </script>
@endsection