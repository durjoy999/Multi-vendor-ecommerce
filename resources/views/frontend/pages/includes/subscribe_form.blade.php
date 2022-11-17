<!-- Start Axil Newsletter Area  -->
<div class="axil-newsletter-area axil-section-gap pt--50">
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image bg_image--12">
            <div class="newsletter-content">
                <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                <form action="{{ route('frontend.subscribe.store') }}" method="POST">
                     @csrf
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="email" name="email" value="{{ old('email') }}">
                            <br>
                            @error('email')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Axil Newsletter Area  -->