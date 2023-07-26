@include('header')
<style>
     .error{
                color:red;
            }
</style>

<main>
    <section>
        <div class="tp">
            <ul itemscope itemtype="javascript:void(0)">
                <li itemprop="itemListElement" itemscope itemtype="javascript:void(0)"><a href="javascript:void(0)"
                        itemprop="item"><span itemprop="name">Africa</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="javascript:void(0)"><a href="javascript:void(0)"
                        itemprop="item"><span itemprop="name">Sign in</span></a>
                    <meta itemprop="position" content="2" />
                </li>
                <li>User Registration</li>
            </ul>
        </div>
        <h1>User Registration</h1>
        <div id="content_container">Please fill out the fields below to create your account. We will send your account
            information to the email address you enter. Your email address and information will NOT be sold or shared
            with any 3rd party.</div>
        <div style="border-bottom: solid 1px #e1e8e9; height: 30px; margin : 0 0 -20px 0;"></div>
        <div class="acenter"
            style="line-height: 40px; width: 40px; margin : 0 auto; background: white; padding-bottom : 10px;">OR</div>

        <form id="user_ragistration">
        
            <h2>Account Information</h2>
            <fieldset>
                <div class="fleft_in">
                    <div class="input text"><label for="UserUsername">Full Name <span>*</span></label><input
                            name="name" type="text" maxlength="30"/></div>
                </div>
                <div class="fleft_in">
                    <div class="input text"><label form="email"> Email <span>*</span></label><input
                        name="email" type="text" maxlength="60" value="" id="UserEmail" />
                    </div>
                </div>
                <div class="fleft_in">
                    <div class="input text"><label for="username" > Username <span>*</span></label><input
                        name="username" type="text" maxlength="60" value=""/>
                    </div>
                </div>
                <div class="fleft_in">
                    <div class="input text"><label for="UserEmail"> Password <span>*</span></label><input
                            name="password" type="password" maxlength="60" value=""  id="password" />
                    </div>
                </div>
                <div class="fleft_in">
                    <div class="input text"><label for="UserEmail"> Confirm Password <span>*</span></label><input
                            name="confirm_password" type="password" maxlength="60" value="" />
                    </div>
                </div>
               
               
            </fieldset>
            
            <fieldset style="border:0">
                <div class="submit">
                    <input id="btn" type="submit" class="show_loading" value="Create Account" />
                    <a href="{{url('/user')}}" class="submit_back" style="padding:15px 20px;
                    border: 2px solid #555555;
                    border-radius: 28px;
                    font-size:16px;">Back</a>
                </div>
                <div class="clear"></div>
            </fieldset>
        </form>



    </section>
</main>
<div id="loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>
<div id="fb-root"></div>
<a href="#nav-top" id="back_to_top">BACK TO TOP&nbsp;&nbsp;<i class="fa fa-angle-double-up"
        aria-hidden="true"></i></a>



@include('footer')
<script src="{{url('project-js/jquery.js')}}"></script>
<script src="{{url('project-js/validation.js')}}"></script>
<script src="{{url('project-js/sweetalert.js')}}"></script>
<script src="{{url('project-js/user/user-login.js')}}"></script>

