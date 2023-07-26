
<footer style="background-color: #1c1720;">
    <section>
        <div class="footer_box">
            <h6>About Us</h6>
            <ul>
                <li>
                  <img src="{{url('img/africa-logo.png')}}" alt="" style="width: 110px; margin-top:25px;">
                      </li>
                <li style="color: white;">Expand your business in Africa <br> with our premier listing platform. <br> Maximize reach, and seize growth opportunities</li>
                
                </ul>
        </div>
        <div class="footer_box">
            <h6>Users</h6>
            <ul><li><a href="{{url('/')}}">Home</a></li>
              <li><a
                href="{{url('user')}}">Sign in</a></li>
                
                <li><a
                  href="{{url('/user/add-listing')}}">Add Business</a></li>
                <li><a
                        href="{{url('/all-questions')}}">Users Questions</a></li>
            </ul>
        </div>
        <div class="footer_box footer_categories">
            <h6>Main Categories</h6>
            <ul>
                <li><a href="{{url('all-category')}}">Categories</a></li><li><a
                        href="{{url('all-location')}}">Locations</a></li><li><a
                        href="{{url('/#works')}}">How it Works</a></li><li><a
                        href="{{url('/#search_box')}}">Search Business</a></li>
            </ul>
        </div>
        <div class="footer_box">
            <h6>Sign Up Now</h6>
            <ul>
              <li>
               <a href="javascript:void(0)"></a> 
               </li>
                <input type="text" style="height: 28px;
                width: 75%;
                border-radius: 5px;
                border: none;
                margin-top:5px;
                font-size:10px; padding-left: 10px;" placeholder="Email Address"
                >
                      <li><a
                      href="#">
                      </a></li>
                      <input type="text" style="height: 28px;
                      width: 75%;
                      border-radius: 5px;
                      border: none;
                      margin-top:5px;
                      font-size:10px; padding-left: 10px;" placeholder="First Name"> 
                      <li><a
                      href="#">
                      </a></li>
                      <input type="text" style="height: 28px;
                      width: 75%;
                      margin-top:5px;
                      border-radius: 5px;
                      border: none;
                      font-size:10px; padding-left: 10px;" placeholder="Last Name">
                       <li>
                        <div style="">
                          <a
                        href="{{url('/user')}}">
                        <button style="    padding: 7px;
                        border-radius: 10px;
                        background: #fff6f6;
                        color: black;
                        margin-top: 10px;
                    }">
                          Sign Up
                        </button>
                        </a>
                        </div>
                       </li>
                     
                   
          </ul>
        </div>
        <div class="clear"></div>
        <!-- <div class="social" id="bottom_fb_likes"><h6>People Like Us</h6><div
                class="fb-like" data-href="#"
                data-width="" data-layout="button_count"
                data-action="like" data-size="large" data-share="true"></div></div> -->
        <div class="social">
            <div class="clear"></div>
            <h6>Follow Us</h6>
            <a
                href="{{url('https://www.facebook.com/')}}"
                rel="noopener" aria-label="Facebook Fan
                Page"><i class="fa fa-facebook" aria-hidden="true"></i></a><a
                href="{{url('https://twitter.com')}}" rel="noopener" aria-label="Twitter Page"><i class="fa
                    fa-twitter" aria-hidden="true"></i></a><a
                href="{{url('https://www.linkedin.com')}}"
                rel="noopener" aria-label="Linkedin
                Page"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a
                href="{{url('https://www.youtube.com')}}"
                rel="noopener" aria-label="Youtube
                Page"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>
        <div id="copyright" class="white">
            &copy; <?php echo date('Y'); ?> Developed By <a href="https://kyptronix.us"><span
                    class="white"> KYPTRONIX LLP</span></a>
        </div>
    </section>
</footer><div id="addthis_show" class="hidden"></div>


</body>

<!-- Mirrored from www.yello.ae/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 05:23:46 GMT -->
</html>
<script src="{{url('project-js/jquery.js')}}"></script>
<script src="{{url('project-js/validation.js')}}"></script>
<script src="{{url('project-js/sweetalert.js')}}"></script>
<script src="{{url('project-js/user/review.js')}}"></script>


<script>
    $(document).ready(function(){
      var autocomplete;
      var id ="location";
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
         types:['geocode'],
      })
      google.maps.event.addListener(autocomplete,'place_changed',function(){
        var place = autocomplete.getPlace();
       
    })
    });
  </script>
   <script>
    $(document).ready(function(){
      var autocomplete;
      var id ="mobile_location";
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
         types:['geocode'],
      })
      google.maps.event.addListener(autocomplete,'place_changed',function(){
        var place = autocomplete.getPlace();
       
    })
    });
  </script>
  <script>
    /* Set the width of the side navigation to 250px */
function openNav() {
document.getElementById("mySidenav").style.width = "300px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}
  </script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>