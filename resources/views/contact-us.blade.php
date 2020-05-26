@extends("layouts.frontend_layout")
@section("content")

    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{asset("front_assets/img/sub_header_general.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <h1>Contact us</h1>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-12">
                <h3>Contact us</h3>
                <div>
                    <div id="message-contact"></div>
                    <form method="post" action="" id="contactform">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control styled" id="name_contact" name="name_contact" placeholder="Jhon">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control styled" id="lastname_contact" name="lastname_contact" placeholder="Doe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" id="email_contact" name="email_contact" class="form-control styled" placeholder="jhon@email.com">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Phone number:</label>
                                    <input type="text" id="phone_contact" name="phone_contact" class="form-control styled" placeholder="00 44 5435435">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your message:</label>
                                    <textarea rows="5" id="message_contact" name="message_contact" class="form-control styled" style="height:100px;" placeholder="Hello world!"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><input type="submit" value="Submit" class="btn_1" id="submit-contact"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
@endsection