@include('header')
<style>
    /* Modal styles */
.gadha {
  opacity: 0;
  position: absolute;
  width: 100%;
  height: 0;
  top: 0;
  left: 0;
  overflow: hidden;
  /* background: rgba(0, 0, 0, 0.8); */
  transition: opacity linear 0.2s;
}
.gadha:target {
  height: 100%;
  opacity: 1;
}
.gadha__content {
  position: relative;
  background: #fff1ed;
  padding: 20px;
  width: 70%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 200;
  box-shadow: 1px 1px 10px;
}
.gadha__content__close {
  position: absolute;
    top: -10px;
    right: -10px;
    width: 30px;
    line-height: 18px;
    border-radius: 12px;
    text-align: center;
    padding: 5px;
    background: #bd0000;
    color: #fff;
}
.gadha__close::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 1;
}

a {
  text-decoration: none;
  color: #2980b9;
}

.container {
  max-width: 600px;
  margin: 20px auto;
}

</style>
<section>
    <div class="tp">
        <ul itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" ><a href="javascript:void(0)"
                    itemprop="item"><span itemprop="name">Africa</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li>All Questions</li>
        </ul>
    </div>
    <h1>List of Questions in Africa Listing </h1>
    <div id="page_text">This is a list of Questions .</div>
    @if(session('ok'))
      <div id="ansMsg" style="margin-bottom:10px;">
        <h5 style="background-color: #a7e9a7;
    text-align: center;
    font-size: medium;
    padding: 8px;
    border-radius: 11px;">{{session('ok')}}</h5>
      </div>
    @endif
  @foreach($questions as $data)

<form action="{{url('/answer-post')}}" method="POST">
   <div style="border: 1px solid darkgray;
    border-radius: 22px;
    padding: 10px;">
    <div style="display: flex;
    text-align: center;
    align-items: center;
    gap: 8px;
}">
        <img src="{{'user-1.png'}}" alt="" style="width: 30px;">
        <h4>{{$data->user_name}}</h4>
        {{@csrf_field()}}
    </div>
    <div>
        <p>{{$data->question }} ?</h6>
    </div>
    <a href="#hello" id="ans-show" onclick="AnsShow({{$data->question_id}})">Show Answer</a> &nbsp;
    <!--<a href="javascript:void(0)">Post Answer</a>-->
    <input type="hidden" name="question_id" value="{{$data->question_id}}" id="">
    <div style="margin-top:10px; display:flex; gap:1rem;">
        <input type="text" name="ans" placeholder="Type Your Answer" style="width: 90%;
    height: 35px;
    border: none;
    outline: none;
    border-radius: 10px;
    border: 1px solid grey;
    padding-left: 10px;" required max="160">
    <button style="padding: 10px;
    border-radius: 8px;
    background-color: #2e9fff;
    outline: none;
    border: none;
    color: white;">Submit</button>
    </div>
   </div> <br>
   </form>

   @endforeach
   <div class="gadha" id="hello">
    <a class="modal__close" href="#"></a>
    <div class="gadha__content">
      <a class="gadha__content__close" style="color:white;" href="###"><span id="ans-close">X</span> </a>
    <div id="parent_div" style="height: 220px; overflow: scroll;">
  
    </div>
    </div>
  </div>
   {{$questions->links()}}



    
</section><br> <br> <br> <br>
@include('footer')
   <script src="{{url('project-js/jquery.js')}}"></script>
<script src="{{url('project-js/validation.js')}}"></script>
<script src="{{url('project-js/user/question_post.js')}}"></script>
<script>
     setTimeout(() => {
                $('#ansMsg').hide(100);
              }, 3000);
</script>