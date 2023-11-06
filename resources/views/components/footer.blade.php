<footer class="pt-4 border-footer">
		<div class="container-fluid col-11">
	  <div class="row">

		<div class="col-6 col-md-2 mb-3">
			<h5 class="text-light">{{__('custom.foot1')}}</h5>
			<ul class="nav flex-column">
			  <li>
				  <x-_locale lang='it' nation="{{__('custom.foot2')}}" />
				  <x-_locale lang='en' nation="{{__('custom.foot3')}}" />
				  <x-_locale lang='es' nation="{{__('custom.foot4')}}" />
			  </li>
			</ul>
		  </div>

		{{-- LINKS --}}

		<div class="col-6 col-md-2 mb-3">
		  <h5 class="text-light">{{__('custom.foot5')}}</h5>
		  <ul class="nav flex-column">
			<li class="nav-item mb-2"><a href="{{route('homepage')}}" class="nav-link p-0 text-white-50">{{__('custom.foot6')}}</a></li>
			<li class="nav-item mb-2"><a href="{{route('about_us')}}" class="nav-link p-0 text-white-50">{{__('custom.foot7')}}</a></li>
			{{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">{{__('custom.foot8')}}</a></li>
			<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white-50">{{__('custom.foot9')}}</a></li> --}}
		  </ul>
		</div>

		 <div class="col-6 col-md-2 mb-3">
            <div class="social-container">
                <ul>
                    <li>
                        <a class="facebook" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="fa fa-twitter-x" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-twitter-x"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                </svg></i>
                        </a>
                    </li>
                    <li>
                        <a class="instagram" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
		  </div>

		<div class="col-md-5 offset-md-1 mb-3">
		  <form>
			<h3 class="text-light"><img src="/assets/images/logo_CB.png" alt="Logo_img" width="15px" height="auto" class="d-inline-block align-text-bottom"> CardBazaar.</h3>
			<p class="text-white-50">{{__('custom.foot10')}}</p>
			<hr style="color: white">
			<p class="text-white-50">{{__('custom.foot11')}}</p>
			<p class="text-white-50">{{__('custom.foot12')}}</p>
			<p class="text-white-50">info@cardbazaar.it</p>
		  </form>
		</div>
	  </div>

	  <hr style="color: white">

	  <div class="d-flex justify-content-center py-1 my-4">
		<p class="text-white-50">Copyright &copy; {{__('custom.foot13')}} DevelHopers, 2023</p>
	  </div>
	</div>
	</footer>

