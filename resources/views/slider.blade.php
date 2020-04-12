<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="owl-slider1" class="owl-carousel owl-theme">
                        <?php 
                            $all_published_slider = DB::table('tbl_slider')
                                                    ->where('publication_status',1)
                                                    ->get();
                            foreach($all_published_slider as $v_slider){

                            ?>
                        <div class="slideritems">
                            
                            <img src="{{URL::to($v_slider->slider_image)}}" class="img-responsive" alt="" />
                            <div class="overlaytext">
                                <h4 class="slidertext1">{{$v_slider->slider_text1}}</h4> <br>
                                <p>{{$v_slider->slider_text2}}</p>
                            </div>
                        </div> 
                        
                       <?php } ?>   

                    </div>
                     
                </div>
            </div>
        </div>
    </section>