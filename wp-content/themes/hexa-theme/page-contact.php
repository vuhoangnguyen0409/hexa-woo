<?php
/**
* Template Name: Contact
**/
get_header();
$theme_url = get_template_directory_uri();
//echo $theme_url;
?>

  <!--======= CONTENT =========-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHHaGPQoduCxNZWlFLWa1XwGelDyjJ9oM"></script><!--get api google map-->
<div id="map" style="width:100%;height:400px;"></div>
<?php echo '<script type="text/javascript">
// エラー文非表示
function TigilError() {
  return true;
}
window.onerror = TigilError;
// 地図
var latlng = new google.maps.LatLng(10.8324742,106.6134391); // change coordinate
var map = new google.maps.Map(document.getElementById("map"), {
zoom: 17,
center: latlng,
scrollwheel: true,
mapTypeId: google.maps.MapTypeId.ROADMAP,
styles: [
  {
    "elementType": "geometry.fill",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "weight": 2.5
      }
    ]
  }
]
});
// マーカー
new google.maps.Marker({
  position: latlng,
  map: map,
  icon: "'.$theme_url.'/images/icon-map.png"
});
</script>';?>
  <div class="content">
    <div class="container">
      <div class="contact">

  <!--======= GOOGLE MAP =========-->









            <!--======= CONTACT FORM =========-->
            <div class="contact-form">

          <h4>SAY SOMETHING</h4>

              <!--======= Success Msg =========-->


              <!--======= FORM  =========-->
              <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
            <form role="form" id="contact_form" method="post" onsubmit="return false">
              <ul class="row">
                <li class="col-sm-3">
                  <label>full name *
                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                  </label>
                </li>
                <li class="col-sm-3">
                  <label>Email *
                    <input type="text" class="form-control" name="email" id="email" placeholder="">
                  </label>
                </li>
                <li class="col-sm-3">
                  <label>Phone *
                    <input type="text" class="form-control" name="company" id="company" placeholder="">
                  </label>
                </li>
                <li class="col-sm-3">
                  <label>WebSite
                    <input type="text" class="form-control" name="website" id="website" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Message
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                  </label>
                </li>
                <li class="col-sm-12">
                  <button type="submit" value="submit" class="btn btn-1" id="btn_submit" onclick="proceed();">SEND NOW <i class="fa fa-long-arrow-right"></i></button>
                </li>
              </ul>
            </form>

            </div>


      </div>


      <!--======= RIGHTS =========-->

    </div>
  </div>
  <?php get_footer(); ?>
