@extends('welcome')

@section('content')
<style>
    .button-box .default-btn {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #ddd;
    color: #777;
    font-size: 14px;
    line-height: 1;
    margin-top: 10px;
    padding: 12px 36px 10px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
    border-radius: 50px;
}
.button-box .default-btn-facebook {
    /* background: transparent none repeat scroll 0 0; */
    /* border: 1px solid #ddd; */
    color: #fff;
    background-color: #1d3d81;
    font-size: 14px;
    line-height: 1;
    margin-top: 10px;
    padding: 12px 36px 10px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
    border-radius: 50px;
}
.button-box .default-btn-youtube {
    color: #fff;
    background-color: #dd4b39;
    font-size: 17px;
    line-height: 1; 
    margin-top: 10px;
    padding: 9px 36px 10px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
    border-radius: 50px;
}

.button-box .default-btn-twitter {
    color: #fff;
    background-color: #00acee;
    font-size: 14px;
    line-height: 1;
    margin-top: 10px;
    padding: 12px 36px 10px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
    border-radius: 50px;
}



</style>

<div class="about-story pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="story-img">
                    <img src="assets/img/product/banner11.png" alt="">
                    <div class="about-logo">
                        <h3>{{ $info->company_name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="story-details pl-50">

                    @if ($about->block1==1)
                    <div class="story-details-top">
                        <h2>{!! $about->title1 !!}</h2>
                        <p>{{ $about->des1 }}</p>
                    </div>
                     @endif
                     @if ($about->block2==1)
                    <div class="story-details-bottom">
                        <h4>{{ $about->title2 }}</h4>
                        <p>{{ $about->des2 }}</p>
                    </div>
                     @endif

                    @if ($about->block3==1)
                    <div class="story-details-bottom">
                        <h4>{{ $about->title3 }}</h4>
                        <p>{{ $about->des3 }}</p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-banner-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class=" mb-30">
                    <a href=""><img src="{{ $about->banner2 }}" alt=""></a>
                    
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="goal-area pb-65">
    <div class="container">
        <div class="row">

            @if ($about->block4==1)
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>{{ $about->title4 }}</h3>
                    <p>{{ $about->des4 }}</p>
                </div>
            </div>       
            @endif

            @if ($about->block5==1)
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>{{ $about->title5 }}</h3>
                    <p>{{ $about->des5 }}</p>
                </div>
            </div> 
            @endif


            @if ($about->block6==1) 
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>{{ $about->title6 }}</h3>
                    <p>{{ $about->des6 }}</p>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
<div class="choose-area pb-100">
    <div class="container">
        @if ($about->block7==1)
           <div class="about-section">
            <h3>{!! $about->title7 !!}</h3>
            <p>{{ $about->des7 }}</p>
            </div>             
        @endif
        
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="all-causes">
                    <div class="row">
                        <div class="col-md-6 causes-res">

                            @if ($about->block8==1)
                                <div class="choose-wrapper">
                                <h4>{{ $about->title8 }}</h4>
                                <p>{{ $about->des8 }} </p>
                                </div>
                            @endif

                            @if ($about->block9==1)
                                <div class="choose-wrapper">
                                <h4>{{ $about->title9 }}</h4>
                                <p>{{ $about->des9 }} </p>
                                </div>
                            @endif

                            @if ($about->block10==1)
                               <div class="choose-wrapper">
                                <h4>{{ $about->title10 }}</h4>
                                <p>{{ $about->des10 }}</p>
                                </div> 
                            @endif

                            @if ($about->block11==1)
                                <div class="choose-wrapper">
                                <h4>{{ $about->title11 }}</h4>
                                <p>{{ $about->des11 }}</p>
                                </div>
                            @endif
                            
                        </div>
                        <div class="col-md-6">
                            @if ($about->block12==1)
                                 <div class="choose-wrapper">
                                <h4>{{ $about->title12 }}</h4>
                                <p>{{ $about->des12 }}</p>
                                </div>
                            @endif
                           

                            @if ($about->block13==1)
                                 <div class="choose-wrapper">
                                <h4>{{ $about->title13 }}</h4>
                                <p>{{ $about->des13 }}</p>
                                </div> 
                            @endif
                          

                            @if ($about->block14==1)
                                <div class="choose-wrapper">
                                <h4>{{ $about->title14 }}</h4>
                                <p>{{ $about->des14 }}</p>
                                </div>
                            @endif
                            
                            <div class="choose-wrapper">
                                <h4>Connect with us:</h4>
                                <div class="button-box mt-30">
                                    <a href="{{ $info->facebook }}" class="default-btn-facebook floatright"><i class="ti-facebook text-light"></i></a>
                                    <a href="{{ $info->youtube }}" class="default-btn-youtube floatright"><i class="ti-youtube"></i></a>
                                    <a href="{{ $info->twitter }}" class="default-btn-twitter floatright"><i class="ti-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="choose-banner-wrapper f-right">
                    <img src="{{ $about->banner3 }}" alt="">
                    <div class="choose-banner-text">
                        <h4>DEALS <br>OF THE DAY</h4>
                        <h3>UP TO <br><span>50%</span> <br>OFF</h3>
                        <a href="">SHOP NOW </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection