@extends('frontend.layout.master')
@section('title','Contact Us')
@section('main')
	 <main class="main">
            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                       
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1461129193917!2d105.79574771422519!3d21.02683888599935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab44f5bffb75%3A0xfb67dbc757080b88!2zMzgxIE5ndXnhu4VuIEtoYW5nLCBZw6puIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1576691653844!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                         <h2 class="light-title">Liên hệ với <strong>Chúng tôi</strong></h2>
                        <form action="#">
                            <div class="form-group required-field">
                                <label for="contact-name">Họ và tên</label>
                                <input type="text" class="form-control" id="contact-name" name="contact-name" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="contact-email">Email</label>
                                <input type="email" class="form-control" id="contact-email" name="contact-email" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="contact-phone">Số điện thoại</label>
                                <input type="tel" class="form-control" id="contact-phone" name="contact-phone">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label for="contact-message">CHúng tôi có thể giúp gì cho bạn?</label>
                                <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-8 -->

                    <div class="col-md-4">
                        <h2 class="light-title">Liên hệ với<strong>chúng tôi</strong></h2>

                        <div class="contact-info">
                            <div>
                                <i class="icon-phone"></i>
                                <p><a href="tel:">0854408269</a></p>
                            </div>
                            <div>
                                <i class="icon-mobile"></i>
                                <p><a href="tel:">0854408269</a></p>
                            </div>
                            <div>
                                <i class="icon-mail-alt"></i>
                                <p><a href="mailto:#">manhtien@gmail.com</a></p>
                                <p><a href="mailto:#">VietTien@portotemplate.com</a></p>
                            </div>
                            <div>
                                <i class="icon-skype"></i>
                                <p>Vietien_skype</p>
                                <p>Vietien_template</p>
                            </div>
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-8"></div><!-- margin -->
        </main><!-- End .main -->
@stop