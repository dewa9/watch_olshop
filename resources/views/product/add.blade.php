 @extends('layout.master_admin')
 @section('title','Product')
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
                    <h2><small>Tambah Data Product</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <!-- Smart Wizard -->
                   
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a id="step1" href="#" >
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Produk</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a id="step2" href="#">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Spesifikasi Produk</small>
                                          </span>
                          </a>
                        </li>
                        
                        <li>
                          <a id="step3" href="#">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Gambar</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                    <br />
                    <div id="step-1" style="display:none;">
                    <form  action="{{url('/product/storeproduct')}}" method="post" class="form-horizontal form-label-left" 
                    id="form-product">
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk">Merk 
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          {!! Form::select('id_merek', $arrmerk, 'Pilih', array('class' => 'form-control')) !!}
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kodeproduk" maxlength="50">Kode Produk 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="kode_produk"  required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">Nama Produk 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama_produk"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">Harga
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="input-group">
                             <span class="input-group-addon">Rp</span>
                            <input class="form-control col-md-7 col-xs-12" name="harga"  required="required" type="text">
                          </div>
                          
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">Deskripsi
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="deskripsi"></textarea>
                        </div>
                      </div>
                       

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send-product" type="submit" class="btn btn-success">Lanjut</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!--step ke dua-->
                  <div id="step-2" style="display:none;">
                  <form action="{{url('/spesification/storespesification')}}" method="post" class="form-horizontal form-label-left" id="form-spek">
                    <br/>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" id="id-produk" name="id_produk" value="0">
                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Series
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="series"  required="required" type="text">
                          
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Gender
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <div class="input-group">
                             {!! Form::select('gender', $arrgender, 'Pilih', array('class' => 'form-control')) !!}
                        </div>

                      </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Garansi Produk
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
						<div class="input-group">
                            <input class="form-control col-md-7 col-xs-12" name="garansi_produk"  required="required" type="number">
							<div class="input-group-addon"><span>Tahun</span></div>
						</div>
                       
                      </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case Diameter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="input-group">
                            <input class="form-control col-md-7 col-xs-12" name="case_diameter"  required="required" type="number">
							<div class="input-group-addon">mm</div>
						</div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case Thickness
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="input-group">
                            <input class="form-control col-md-7 col-xs-12" name="case_thickness"  required="required" type="number">
						<div class="input-group-addon">mm</div>
						</div>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Water Resistant
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="input-group">
                            <input class="form-control col-md-7 col-xs-12" name="water_resistant"  required="required" type="text">
							<div class="input-group-addon">m</div>
						</div>
                        </div>
                      </div>

                   
                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case Material
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="case_material"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case Back
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="case_back"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Glass Material
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="glass_material"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Strap Material
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="strap_material"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Clasp
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="clasp"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Calendar
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="calendar"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Driving System
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="driving_system"  required="required" type="text">
                        </div>
                      </div>

                      </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Calibre Number
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="caliber_number"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="case"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Case Coating
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="case_coating"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Lumbright
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="lumibright"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Accuracy
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="accuracy"  required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Magnetic Reductance
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="magnetic_reluctance"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Luminious Lumbrite
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="luminious_lumibrite"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Movement
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="movement"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Dial Color
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="dial_color"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Bracelet
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="bracelet"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Features
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="features"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Weight After Packing
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="weight_after_packing"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" maxlength="50">Inside Box
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="inside_box"  required="required" type="text">
                        </div>
                      </div>
                       <div class="ln_solid"></div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send-spek" type="submit" class="btn btn-success">Lanjut</button>
                        </div>
                      </div>

                    </form>
                  </div>

                  <!--step ke dua-->
                  <div id="step-3" style="display:block;">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                    <form entype="multipart/form-data" action="{{url('/product/storeimage')}}" method="post" class="form-horizontal form-label-left" 
                    id="form-image">
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" id="produk-id" name="id-produks" value="2">
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">Gambar
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             <span class="input-group-addon">Gambar I</span>
                              <input class="form-control col-md-7 col-xs-12 image_product" name="gambar1"  required="required" type="file">
                             
                          </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             <span class="input-group-addon">Gambar II</span>
                              <input class="form-control col-md-7 col-xs-12 image_product" name="gambar2"  required="required" type="file">
                          </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" maxlength="50">
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <div class="input-group">
                             
                             <span class="input-group-addon">Gambar III</span>
                             <input class="form-control col-md-7 col-xs-12 image_product" name="gambar3"  required="required" type="file">
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send-iamge" type="submit" class="btn btn-success">Selesai</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                       <div class="">
                        <img class=" img-rounded" style="max-width: 70%;" id="image_show" src="{{ URL::asset('images/user.png')}}" alt="profil-picture" >
                       
                        </div>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
<script src="{{ URL::asset('vendor/jsvalidation/js/jsvalidation.min.js')}}" type='text/javascript'></script>
 <!-- jQuery Smart Wizard -->
    <script src="{{ URL::asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProductRequest', '#form-product') !!}
{!! JsValidator::formRequest('App\Http\Requests\SpesificationRequest', '#form-spek') !!}
{!! JsValidator::formRequest('App\Http\Requests\ProductImagerequest', '#form-image') !!}

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
  var notify=null
  $(document).ready(function(){
      $('#step2,#step3').addClass("disabled");
      
      //form
      $('#form-product').submit(function(e){
          e.preventDefault();
          $('#send-product').button('loading');
          var _datasend=$(this).serialize();
          $('#form-product input').attr("disabled", "disabled");
          
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
                $('#form-product').trigger('reset');
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                  }, 2000);
                  $('#step1').addClass('done');
                  $('#step2').removeClass('disabled');
                  $('#step-1').hide();
                  $('#step-2').show();
                  $('#id-produk').val(data.id)
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
              $('#form-product input').removeAttr('disabled').trigger('reset');
              $('.form-group').removeClass('has-success');
              $('#send-product').button('reset');
            }
          });
      });

 $('#form-spek').submit(function(e){
          e.preventDefault();
          $('#send-spek').button('loading');
          var _datasendspek=$(this).serialize();
          $('#form-spek input').attr("disabled", "disabled");
          
          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: _datasendspek,
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
                $('#form-spek').trigger('reset');
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                  }, 2000);
                  $('#step2').addClass('done');
                  $('#step3').removeClass('disabled');
                  $('#step-2').hide();
                  $('#step-3').show();
                  $('#produk-id').val(data.id);
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
              $('#form-spek input').removeAttr('disabled').trigger('reset');
              $('.form-group').removeClass('has-success');
              $('#send-spek').button('reset');
            }
          });
      });

 //image
  $('.image_product').change(function(){
            readURL($(this));
           
        });
  });
</script>
@endsection