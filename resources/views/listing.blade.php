@include('header')
<style>
    *{
 margin:0;
  padding:0;
  box-sizing:border-box;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
}
.star-cb-group {
  /* remove inline-block whitespace */
  font-size: 0;
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  /* the hidden clearer */
}
.star-cb-group * {
  font-size: 1rem;
}
.star-cb-group > input {
  display: none;
}
.star-cb-group > input + label {
  /* only enough room for the star */
  display: inline-block;
  /* overflow: hidden; */
  text-indent: 9999px;
  width: 1em;
  white-space: nowrap;
  cursor: pointer;
  font-size: 40px;
}
.star-cb-group > input + label:before {
  display: inline-block;
  text-indent: -9999px;
  content: "☆";
  color: #888;
}
.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
  content: "★";
  color: #ffd60a;
  text-shadow: 0 0 1px #333;
}
.star-cb-group > .star-cb-clear + label {
  text-indent: -9999px;
  width: .5em;
  margin-left: -.5em;
}
.star-cb-group > .star-cb-clear + label:before {
  width: .5em;
}
.star-cb-group:hover > input + label:before {
  content: "☆";
  color: #888;
  text-shadow: none;
}
.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
  content: "★";
  color: #ffd60a;
  text-shadow: 0 0 1px #333;
}


.rating-box{
  /* width:300px; */
  height:300px;
  border:solid 1px #c1c1c1;
  margin:0 auto;
  position:relative;
}

fieldset{border:none;padding:10px 20px;}
.rating-success{display:none;
    text-align: center;
    font-size: 20px;
    padding: 30px 0;}
.rating-success.active{display:block}

.rating-form input.text-field{display:block;width:100%;line-height:25px;font-size:14px;padding:0 10px;border:solid 1px #c1c1c1;}

.rating-form #review{width:100%;padding:0 10px;line-height:25px;font-size:14px;height:100px;border:solid 1px #c1c1c1;}

.rating-form #submit{width:100px;line-height:30px;font-size:14px;border-radius:0;-webkit-appearance:none;background: #467379;color: white;border:none;outline:none;}

.error{padding-left:20px;color:red;font-size:12px;}

header{
    padding-top: 5px;
}

a.lightbox img {
width: 252px;
height: 208px;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
margin: 5px 20px 20px 20px;
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: fixed;
top: -100%;
width: 100%;
background: rgba(0,0,0,.7);
width: 100%;
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
 
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
  
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
z-index: 1111;
  /* overflow:scroll; */
}

.lightbox-target:target img {
max-height: 75%;
max-width: 75%;
}

.lightbox-target:target a.lightbox-close {
top: 0;
}
.desc table{
    width:100%;
}



</style>
    <main>
        <section>
            <div class="tp">
                <ul itemscope itemtype="#">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a
                            href="javascript:void(0)" itemprop="item"><span itemprop="name">Africa Listing </span></a>
                    </li>
                 
                        
                   
                    <li>{{$data->category_name}}</li>
                </ul>
            </div>
            <h1>{{$data->listing_title}} </h1>
            <div>
                {{-- <div id="cmp_top" >
                    <div class="cmp_rate">
                        <div class="stars"><i class="fa fa-fw fa-star-o" aria-hidden="true"></i><i
                                class="fa fa-fw fa-star-o" aria-hidden="true"></i><i class="fa fa-fw fa-star-o"
                                aria-hidden="true"></i><i class="fa fa-fw fa-star-o" aria-hidden="true"></i><i
                                class="fa fa-fw fa-star-o" aria-hidden="true"></i></div>
                        <span class="rate">0.0</span>
                        <span class="reviews_count">0 Reviews</span>
                    </div>
                   

                    <div class="cmp_buttons">
                        <a href="#review"
                            class="review_button r_2px">Write a Review</a>
                    </div>
                </div> --}}
            </div>
            <div id="company_item">
                <div id="left">
                    <div id="cmp_nav" data-selected=".nav_home">
                        <div id="cmp_nav_line"></div>
                        <div id="cmp_nav_slider">
                            <nav>
                                <a href="#contact"
                                    class="nav_home">Contacts</a>
                                <a
                                    href="#gallery"
                                    class="nav_send-enquiry" title="Send Enquiry">Gallery Photo
                                </a>
                                <a
                                    href="#map"
                                    class="nav_map">Map</a>
                                    <a
                                    href="#review"
                                    class="nav_send-enquiry" title="Send Enquiry">Reviews
                                </a>
                                    
                            </nav>
                        </div>
                    </div>
                    <div class="cmp_details">
                        <div class="cmp_details_in">
                            <div class="photos">
                                <div class="photos_in">
                                    <a href="javascript:void(0)"
                                        class="photo_href" title="Company photo"><img
                                            src="{{url('listing_photo')}}/{{$data->photo}}"
                                            data-src=""
                                            alt="" class="lazy-img r_3px" 
                                             style="width:300px;height:285px "></a>
                                </div>
                                {{-- <a href="https://www.yello.ae/company/348518/corporate-researchinvestigations-llc/upload"
                                    class="upload_button"><i class="fa fa-camera" aria-hidden="true"></i>Add a
                                    Photo</a> --}}
                            </div>
                           @if ($data->status>1)
                            <div class="cmp_marks">
                                <div class="cmp_marks_con">
                                    <div class="cmp_mark">
                                        <div class="vvv r_3px"><i class="fa fa-check"
                                                aria-hidden="true"></i><b>Verified</b><br />Listing</div>
                                    </div>
                                </div>
                            </div>
                           @endif
                            <div class="info" id="contact">
                                <div class="label">Company name</div><b id="company_name">{{$data->listing_title}}</b>
                            </div>
                            <div class="info">
                                <div class="label">Address</div>
                                <div class="text location">{{$data->address}}
                                    <a
                                        href="#map"
                                        class="see_all" style="width:140px;">View Map <i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a></div>
                            </div>
                            <div class="info">
                                <div class="label">Phone Number</div>
                                <div class="text phone">{{$data->phone_number}}<br /></div>
                            </div>
                            <div class="info">
                                <div class="label">Mobile phone</div>
                                <div class="text">{{$data->mobile_number}}<br /></div>
                            </div>
                            <div class="info">
                                @if ($data->fax!="")
                                      <div class="label">Fax</div>
                                <div class="text">{{$data->fax}}<br /></div>
                                @endif
                              
                            </div>
                            <div class="info">
                                @if ($data->website!="")
                                   <div class="label">Website</div>
                                <div class="text weblinks"><a href="{{$data->website}}" target="_blank">{{$data->website}}</a>
                                </div>  
                                @endif
                               
                            </div>

                            <div class="info"><span class="label">Establishment year - </span> {{$data->year}}</div>
                         @if ($data->employe!="")
                              <div class="info"><span class="label">Employees - </span> {{$data->employe}}</div> 
                         @endif
                          

                             <div class="info">
                        <div class="label"><b>Working hours</b></div>
                        <div class="desc openinghours">
                            <table>
                                <tr>
                                    <th>Weekday</th>
                                    <th>Time</th>
                                </tr>
                                <tr>
                                    <td>Monday:</td>
                                    <td>{{$data->mon_start}} -{{$data->mon_end}}</td>
                                </tr>
                                <tr>
                                    <td>Tuesday:</td>
                                    <td>{{$data->tue_start}} -{{$data->tue_end}}</td>
                                </tr>
                                <tr>
                                    <td>Wednesday:</td>
                                    <td>{{$data->wed_start}} -{{$data->wed_end}}</td>
                                </tr>
                                <tr>
                                    <td>Thursday:</td>
                                    <td>{{$data->thusday_start}} -{{$data->thusday_end}}</td>
                                </tr>
                                <tr>
                                    <td>Friday:</td>
                                    <td>{{$data->friday_start}} -{{$data->friday_end}}</td>
                                </tr>
                                <tr>
                                    <td>Saturday:</td>
                                    <td>{{$data->saturday_start}} -{{$data->saturday_end}}</td>
                                </tr>
                                <tr class="current_day b">
                                    <td>Sunday:</td>
                                    <td>{{$data->sun_start}} -{{$data->sun_end}} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                            
                            <div class="info"><span class="label">Company manager - </span> {{$data->manager}}</div>
                            <div class="info">
                                <div class="label">E-mail</div>
                                <div>
                                    {{$data->email}}
                                </div> <br>
                                <div class="text"><a
                                        href="mailto:{{$data->email}}"
                                        title="Send Enquiry" class="blue_button send_email"><i
                                            class="fa fa-envelope-o" aria-hidden="true"></i>Send Enquiry</a></div>
                            </div>
                            {{-- <a href="https://www.yello.ae/jobs" class="blue_button send_email">Job Search</a> --}}
                            {{-- <div class="info share_box">
                                <div class="label">Share this listing</div>
                                <div id="cmp_share">
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div id="right">
                    <div class="ad600">
                        <div style="margin-top:50px;border:1px solid rgb(230 230 230); height:300px; display:flex; justify-content:center; align-items:center;">
                            <img src="{{url('map.gif')}}" alt="" style="width: 50%; height:50%">
                            </div>     
                        <div class="side-box" style="margin-top:25px; border:1px solid rgb(230 230 230); height:300px;">
                          		
							<div class="widget widget_share">
								<h4 class="m-b10" style="    font-size: 20px;
                                margin: 24px;
                                color: #bd0000;
                                text-align:center;">Contact Details</h4>
								<div class="dlab-separator m-b20" ></div>
								<ul class="list-inline m-a0 text-white" style="padding: 15px;">
									<li>
                                       <i class="fa fa-map-marker text-secondary" style="font-size: large" ></i> &nbsp;&nbsp;
											<span class="m-b0" style="padding-top: 13px; color:black;">{{$data->address}}</span>
									</li> <br> <br>
									<li>
										<i class="fa fa-phone text-secondary"  style="font-size: large"></i> &nbsp;&nbsp;
									<span class="m-b0" style="color: black;">{{$data->mobile_number}} </span>
									 </li> <br><br>
                                     @if ($data->website!="")
                                          <li>
										<i class="fa fa-globe text-secondary" style="font-size: large"></i>&nbsp;&nbsp;
								       <span class="m-b0" ><a href="{{url($data->website)}}" style="text-decoration:none; color:#bd0000">{{$data->website}}</a></span>
									 </li>
                                     <br>
                                     @endif

								</ul>
							</div>
                        </div>    
                                   
                    </div>
                </div>
                <div class="clear"></div>
                <a name="reviews"></a>
                @if ($data->gallery_1!="" && $data->gallery_2!="" && $data->gallery_3!=""&& $data->gallery_4!="") 
                      <div class="info noreviews">
                    <h2 style="padding:0px;">Gallery Photos</h2>
     
</div>
<div id="gallery" ></div>
                @endif
                


<div class="gallery-container d-flex align-items-center justify-content-center" id="gallery-container" style="display:flex; justify-content:center; gap:1.5rem;">
    @if($data->gallery_1!="")
  <a class="lightbox" href="#dog">
   <img src="{{url('listing_photo')}}/{{$data->gallery_1}}"/>
</a> 
<div class="lightbox-target" id="dog">
   <img src="{{url('listing_photo')}}/{{$data->gallery_1}}"/>
   <a class="lightbox-close" href="#"></a>
</div>
    {{-- <img src="{{url('listing_photo')}}/{{$data->gallery_1}}" alt="" style="width: 284px; border-radius:5px;"> --}}
    
    @endif
   @if($data->gallery_2!="") 
   {{-- <img src="{{url('listing_photo')}}/{{$data->gallery_2}}" alt="" style="width: 284px; border-radius:5px;"> --}}

   <a class="lightbox" href="#dog2">
   <img src="{{url('listing_photo')}}/{{$data->gallery_2}}"/>
</a> 
<div class="lightbox-target" id="dog2">
   <img src="{{url('listing_photo')}}/{{$data->gallery_2}}"/>
   <a class="lightbox-close" href="#"></a>
</div>
    @endif
     @if($data->gallery_3!="") 
     {{-- <img src="{{url('listing_photo')}}/{{$data->gallery_3}}" alt="" style="width: 284px; border-radius:5px;"> --}}
  <a class="lightbox" href="#dog3">
   <img src="{{url('listing_photo')}}/{{$data->gallery_3}}"/>
</a> 
<div class="lightbox-target" id="dog3">
   <img src="{{url('listing_photo')}}/{{$data->gallery_3}}"/>
   <a class="lightbox-close" href="#"></a>
</div>
      @endif
       @if($data->gallery_4!="")
       {{-- <img src="{{url('listing_photo')}}/{{$data->gallery_4}}" alt="" style="width: 284px; border-radius:5px;" >  --}}
  <a class="lightbox" href="#dog4">
   <img src="{{url('listing_photo')}}/{{$data->gallery_4}}"/>
</a> 
<div class="lightbox-target" id="dog4">
   <img src="{{url('listing_photo')}}/{{$data->gallery_4}}"/>
   <a class="lightbox-close" href="#"></a>
</div>
       @endif

</div>


                    

                </div>

                <div class="info noreviews">
                    <h2 style="padding:35px 0 15px;">Reviews</h2> <br>
                    <div class="general_rate">
                        <div class="stars"></div>
                        {{-- <div class="general_rate_t">0 Reviews</div> --}}
                        <div class="clear"></div>
                        {{-- <div class="rate rate_0 rate_big">0.0</div> --}}
                        <div class="rate_gap">&nbsp;</div><a
                            href="#review"
                            class="blue_button">Write a Review</a>
                        <div class="clear"></div>
                    </div>
                    <div class="text">This company has no reviews. Be the first to share your experiences!</div>
                </div>
               
       
              
                <a name="map"></a>
                <h2>Company Details</h2>
                <div class="cmp_more">
                    <div class="info info_map">
                        <div class="label">Location map</div>
                        <div id="map" style="width:100%; border:solid white 1px; height:300px"></div>
                        </div>
                        <div id="map_expander" class="hidden">Expand Map</div>
                        <div class="gray map_address"> 
                            <a href="#">{{$data->address}}</a>
                            {{-- <a
                                href="https://maps.google.com/maps?daddr=25.2088098361818,55.2773488476685&amp;saddr="
                                id="map_dir_button" class="see_all see_all_long" rel="nofollow noopener"
                                target="_blank">Get Directions <i class="fa fa-external-link"
                                    aria-hidden="true"></i></a> --}}
                                </div>
                    </div>
                    <div class="info">
                        <div class="label">Description</div>
                        <div class="text desc">{{$data->description}}
                        </div>
                    </div><a name="hours"></a>
                   
                    <a name="products"></a>
                    <div class="info">
                       
                    </div>
                    
                 <div class="invitation_to_list" id="review">
                    <h2 class="def_h2">Review Form</h2>
                    {{-- RATING FORM  --}}
                    <div class='rating-box'>
                        <form class='rating-form' id="review-submit">
                          <fieldset>
                            <span class="star-cb-group">
                              <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                              <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                              <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                              <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                              <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                              <input type="radio" id="rating-0" name="rating" value="0" checked="checked" class="star-cb-clear" /><label for="rating-0">0</label>
                            </span>
                          </fieldset>
                          <fieldset>
                            {{@csrf_field()}}
                            <textarea name='comment' id='review' maxlength='100' placeholder='Write your review hear (Required)' required></textarea>
                            </fieldset>
                        
                          <fieldset>
                            <input type='submit' value='Submit' id='submit'>
                            </fieldset>
                            <input type="hidden" name="listing_id" value="{{$data->listing_id}}"> 
                          
                        </form>
                          <p class='rating-success'>Thank you for your review</p>
                        </div>
                        

                    {{-- RATING FORM  --}}
                  
                    
                </div>
                </div>

                @foreach ($review as $comments)
                <div style="margin-top:10px; border:1px solid #dbd4d4; padding:10px;">
                    <div class="" style="display: flex;">
                        <img src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="" style="width:25px;">
                        <b style="margin-left:10px;">{{$comments->user_name}}</b> 
                    </div>
        <div style="margin-left:26px; ">
            @for($i=1; $i<=$comments->rating; $i++)
            <img src="{{url('star.png')}}" alt="" style="width:15px;">
            @endfor

        </div>
                    <span style="margin-left:26px;">
                        @php
                            echo date('d-M-Y',strtotime($comments->created_at))
                        @endphp
                    </span>
                    <p style="margin-left:26px;">
                   
                        {{$comments->comment}}
                    </p>

                </div>
                @endforeach

                
               
             
                
               
            <div class="clear"></div><br />
          
            <div class="invitation_to_list">
                <h2 class="def_h2">Similiar Page for Your Business?</h2>
                <div class="text">Make sure everyone can find your business online. Create your dedicated company
                    page on <b>Africa Listing</b> - it's simply and easy!</div><br />
                <a href="{{url('user/add-listing')}}" class="blue_button">List Your Business</a>
            </div> <br>
             <h2 class="def_h2">Share the link with others:</h2>
              <br /><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Facebook" onclick="Copy();"><i
                            class="fa fa-facebook" aria-hidden="true" style="display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    margin-right: 20px;
    font-size: 18px;
    color: #6f94a6;
    border: 1px solid #6f94a6;
    border-radius: 50%;
    float: left;
    text-align: center;"></i></a><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Linkedin" onclick="Copy();"><i
                            class="fa fa-linkedin" aria-hidden="true" style="display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    margin-right: 20px;
    font-size: 18px;
    color: #6f94a6;
    border: 1px solid #6f94a6;
    border-radius: 50%;
    float: left;
    text-align: center;"></i></a><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Twitter" onclick="Copy();"><i
                            class="fa fa-twitter" aria-hidden="true" style="display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    margin-right: 20px;
    font-size: 18px;
    color: #6f94a6;
    border: 1px solid #6f94a6;
    border-radius: 50%;
    float: left;
    text-align: center;"></i></a>
                    <div class="clear"></div>
            <br />
        </section>
        
    </main>
    
    <div id="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>
    <div id="fb-root"></div>
    <a href="#nav-top" id="back_to_top" style="color:white;"><b>BACK TO TOP&nbsp;&nbsp;</b><i class="fa fa-angle-double-up"
            aria-hidden="true"></i></a>
  @include('footer')
 <script>
    function ShowMap(lat , lng){
        var latitude = {{$data->lat}};
        var longitude = {{$data->lan}};
        var coord = {lat:latitude,lng:longitude} ;
        var map = new google.maps.Map(
            document.getElementById('map'),
            {
                zoom:12,
                center:coord
            }
            
        );
        new google.maps.Marker({
         position:coord,
         map:map,
        });
    }
    ShowMap({{$data->lat}},{{$data->lan}});
    
    // {{$data->listing_id}}


</script>
  <script>
    function Copy(){

  $("#copy").val(window.location.href).select();
          // Get the URL
    var url = window.location.href;

    // Create a temporary input element
    var input = $('<input>');
    $('body').append(input);

    // Set the value of the input to the URL
    input.val(url).select();

    // Copy the URL to the clipboard
    document.execCommand('copy');

    // Remove the temporary input element
    input.remove();

    // Provide some visual feedback
      swal("URL Copied..");
 
    }
  </script>

