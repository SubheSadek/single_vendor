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
        <!-- shopping-cart-area start -->
        <div class="contact-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-map-wrapper">
                            <div class="contact-map mb-40">
                                <div id="hastech2"></div>
                            </div>
                            <div class="contact-message">
                                <div class="contact-title">
                                    <h4>Contact Information</h4>
                                </div>
                                <form action="{{ url('/messages') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Name*</label>
                                                <input name="name" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Email*</label>
                                                <input name="email" required="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-input-style mb-30">
                                                <label>subject</label>
                                                <input name="subject" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-textarea-style mb-30">
                                                <label>Comment*</label>
                                                <textarea class="form-control2" name="content" required=""></textarea>
                                            </div>
                                            <button class="submit contact-btn btn-hover" type="submit">
                                                Send Message 
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-title">
                                <h4>Location & Details</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Address:</span>  {{ $info->address }}</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-mail"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Email: </span> {{ $info->email }}</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-call"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Phone: </span>  (+880) {{ $info->phone_one }}</p>
                                    </div>
                                </div>
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
            </div>
        </div>
        <!-- shopping-cart-area end -->
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlZPf84AAVt8_FFN7rwQY5nPgB02SlTKs "></script>
<script>
    var myCenter=new google.maps.LatLng(30.249796, -97.754667);
    function initialize()
    {
        var mapProp = {
          center:myCenter,
          scrollwheel: false,
          zoom:15,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };
        var map=new google.maps.Map(document.getElementById("hastech2"),mapProp);
        var marker=new google.maps.Marker({
          position:myCenter,
            animation:google.maps.Animation.BOUNCE,
          icon:'',
            map: map,
          });
        var styles = [
          {
            stylers: [
              { hue: "#c5c5c5" },
              { saturation: -100 }
            ]
          },
        ];
        map.setOptions({styles: styles});
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@endsection