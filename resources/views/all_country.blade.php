@include('header')
<section>
    <div class="tp">
        <ul itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" ><a href="javascript:void(0)"
                    itemprop="item"><span itemprop="name">Africa</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li>Browse Locations</li>
        </ul>
    </div>
    <h1>List of All Countries in Africa Listing.</h1>
    <div id="page_text">This is a list of Countries in Africa Listing . </div>
  
    <div class="box">
       @foreach($all_location as $category_data)
        <ul class="cat_list" >
            <li style="color: #414141;
    border: solid 1px #eee;
    line-height: 36px;
    height: 36px;
    display: block;
    margin: 0 5px;
    padding: 0 45px 0 15px;
    border-radius: 2px;
    background: #f6f7f9;
    position: relative;
    font-size: 14px;
    margin-top:10px;"><a href="{{url('category/country/listing')}}/{{$category_data->country}}" title="Companies in Ras Al Khaimah" class="city238">{{$category_data->country}}</a></li>
        </ul>
        @endforeach
        

        <div class="clear"></div>
    </div>
</section><br> <br> <br> <br>
@include('footer')
