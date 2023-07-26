@include('header')
    <main>
        <section>
            <div class="tp">
                <ul itemscope itemtype="javascript:void(0)">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a
                            href="javascript:void(0)" itemprop="item"><span itemprop="name">Africa</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="javascript:void(0)"><a
                            href="javascript:void(0)" itemprop="item"><span
                                itemprop="name">Categories</span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="javascript:void(0)"><a
                            href="javascript:void(0)" itemprop="item"><span itemprop="name">Listings</span></a>
                        <meta itemprop="position" content="3" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="javascript:void(0)"><a
                            href="javascript:void(0)" itemprop="item"><span itemprop="name">{{$category_name->category_name}}</span></a>
                        <meta itemprop="position" content="4" />
                    </li>
                </ul>
            </div>
            <h1>Best {{$category_name->category_name}}s in Africa</h1>
            <div id="page_text">Looking for <strong>Best {{$category_name->category_name}}</strong> in Africa .</div>
            <div id="filters" data-selected=".cat678">
                <h5 class="r_2px"><a href="#">Filter by Country</a></h5>
                <div class="cats m_hidden">
                    
                    <ul>
                        @foreach($country as $all_country)
                        <li><a href="{{url('category/country/listing')}}/{{$all_country->country}}" class="city233">{{$all_country->country}}</a></li>
                        @endforeach
                       
                    </ul>
                </div>
                <h5 class="r_2px"><a href="#">All Categories</a></h5>
                <div class="cats m_hidden">
                    <ul>
                        
                      @foreach($category as $all_category)
<li><a href="{{url('/category/listing/')}}/{{$all_category->id}}" class="cat2471"> {{$all_category->category_name}}</a></li>
                      @endforeach
                        
                  
                    </ul>
                </div>
                
            </div>

            <div id="listings">
                <div class="ad336">
                    <ins class="adsbygoogle asas" style="display:block" data-ad-client="ca-pub-3351151485848212"
                        data-ad-slot="3758602228" data-max-num-ads=2 data-ad-format="rectangle"></ins>
                </div>
                <div id="page_text_m">Looking for <strong>Best Real Estate Agents</strong> in Africa </div>
                    <div>
                        <form action="{{url('/search')}}" method="GET">
                            <select name="country" id="" style="width:160px; height:30px;" required>
                      <option value="">Select Country</option>
                         @foreach($country as $all_country)
                       <option value="{{$all_country->country}}">{{$all_country->country}}</option>
                        @endforeach
                            </select>
                            <select name="category" id="" style="width:160px; height:30px;" required>
                                <option value="">Select Category</option>
                                 @foreach($category as $all_category)
                       <option value="{{$all_category->id}}">{{$all_category->category_name}}</option>
                        @endforeach
                            </select>
                            <button type="submit" style="width: 100px; height: 30px; background: #7fc6c8;outline: none; border: none; border-radius: 5px;">Search</button>
                        </form>
                    </div>
                <div class="pages_container_top">We found <strong>{{$count}}</strong> companies</div>
               


        @if(count($data)>0)
        @php
        $i=1;
        @endphp

        @foreach ($data as $listings)
        
        <div class="company with_img g_3" id="cmap_0">
            <h4><a href="{{url('listing')}}/{{$listings->listing_id}}" >{{$listings->listing_title}}</a></h4>
            <div class="address">Location &#45; {{$listings->address}}</div>
            <div class="details">
                <div class="desc">{{$listings->website}}</div><a href="{{url('listing')}}/{{$listings->listing_id}}"
                    class="logo" ><span itemprop="image" itemscope
                        itemtype="http://schema.org/ImageObject">
                        <meta itemprop="url"><img
                            src="{{url('listing_photo')}}/{{$listings->photo}}"
                            data-src="/img/ae/s/_1643103557-99-bazaroo.jpg" alt="photo not found"
                            class="lazy-img r_3px" width="80" height="80"></a>
            </div> 
          @if($listings->status>1)
          <div class="cont"><u class="v"><i class="fa fa-check" aria-hidden="true"></i>
                    &nbsp;Verified</u></div>
                    @else
                    <br>
          @endif
            
            <div class="cont"><a href="{{url('listing')}}/{{$listings->listing_id}}">
                    <div class="s"><i class="fa fa-phone" aria-hidden="true"></i><span>Phone</span>
                    </div>
                    <div class="s"><i class="fa fa-envelope" aria-hidden="true"></i><span>E-mail</span>
                    </div>
                    <div class="s"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Map</span>
                    </div>
                    <div class="s"><i class="fa fa-globe" aria-hidden="true"></i><span>Website</span>
                    </div>
                    {{-- <div class="s"><i class="fa fa-picture-o" aria-hidden="true"></i> 5
                        <span>Photos</span></div> --}}
                </a></div>
            <div class="clear"></div><a href="{{url('listing')}}/{{$listings->listing_id}}" class="mapmarker" data-ltd="25.187424"
                data-lng="55.281025" data-key="0" >{{$i++;}}</a>
        </div> <br>
            
        @endforeach
        @else
        <div style="padding:15px; background-color:antiquewhite">
            <h4 style="text-align:center">Listing Not Found</h4>
        </div>
        @endif
        <div>
            {{$data->links()}}
        </div>

            



                <div class="ad336_b">
                    <ins class="adsbygoogle asas" style="display:block" data-ad-client="ca-pub-3351151485848212"
                        data-ad-slot="8959911556" data-max-num-ads=3 data-ad-format="rectangle"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>

                <div class="pages_container">
                
                </div>


                <div class="suggest">
                    <h6>Didn't find what you were looking for?</h6>
                    <div class="text">Tell us what is missing</div><br />
    @if($count>0)
     <a href="{{url('user/add-listing')}}"
                        class="blue_button">Add Business</a>
                        @else 
        <a href="{{url('user/add-listing')}}"
                        class="blue_button">Add Business</a>
    @endif
                   
                        
                        <br /><br />
                   
                    <!--<div class="text">That's great to hear! If you're satisfied with the {{$category_name->category_name}} listing  . that's what matters the most. It's important to have messaging that resonates with your target audience and effectively communicates the value and benefits of your platform. If you have any further questions or need assistance with anything else, feel free to ask. -->
                    <!--</div> -->
                    <div class="text">Share the link with others:</div><br /><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Facebook" onclick="Copy();"><i
                            class="fa fa-facebook" aria-hidden="true"></i></a><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Linkedin" onclick="Copy();"><i
                            class="fa fa-linkedin" aria-hidden="true"></i></a><a
                        href="javascript:void(0)"
                        rel="noopener" title="Share the List on Twitter" onclick="Copy();"><i
                            class="fa fa-twitter" aria-hidden="true"></i></a>
                    <div class="clear"></div>
                </div>
                <h6> Searched categories</h6><br />
                <div class="tags">
                    @foreach($category as $cats)
                    <a href="{{ url('category/listing') }}/{{ $cats->id }}" title="">{{$cats->category_name}}</a>
                    @endforeach
                   <div id="url"></div>
                        
                        
                       </div>
                <div class="clear"></div>
            </div>
            <div id="mapslider_con" class="m_hidden">
                <div id="mapslider">
                    <div class="" style="width:10px height:150px; display:flex; justify-content:center; align-items:center; margin-top:50px; ">
                        <img src="{{url('mobile.gif')}}" style ="width:300px; height:300px;" alt=""></div>
                   <div class="" style="width:10px height:150px; display:flex; justify-content:center; align-items:center; margin-top:50px; ">
                <img src="{{url('location.gif')}}" style ="width:200px; height:200px;" alt=""></div>
              
                </div>
            </div>
            <div class="clear"></div>
        </section>
    </main>
    <div id="m_map" class="gm_canvas fullscreen hidden"></div>
    <div id="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>
    <div id="fb-root"></div>
    <a href="#nav-top" id="back_to_top" style="color:white;"><b>BACK TO TOP</b>
        &nbsp;&nbsp;<i class="fa
            fa-angle-double-up" aria-hidden="true"></i></a>
  @include('footer')
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