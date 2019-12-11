<section class="section" id="contact">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 col-lg-8 text-center">
                <h2 class="lg-title mb-2">Vous avez des questions?</h2>
                <p class="mb-5">
                    Notre priorité est de vous répondre dans les plus brefs délais
                </p>
            </div>
        </div>
        {{--Form section--}}
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="get" id="main_contact_form" class="contact__form">
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Votre adresse email *" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Sujet *" required="required">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="6" class="form-control" placeholder="Votre message" required="required" ></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="submit text-center">
                                <input name="submit" type="submit" class="btn btn-primary btn-lg" value="Envoyer">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
