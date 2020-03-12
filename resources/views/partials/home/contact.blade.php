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
                <form action="{{ route('contact') }}" method="POST" id="main_contact_form" class="contact__form">
                    {{ csrf_field() }}
                    <!-- end message -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Votre nom *"
                                       value="{{ old('name') ?? (\Illuminate\Support\Facades\Auth::user()->format_full_name ?? '') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </label>
                                <input type="text" name="email" id="email" class="form-control"
                                       placeholder="Votre adresse email *"
                                       value="{{ old('email') ?? (\Illuminate\Support\Facades\Auth::user()->email ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="subject">
                                    @if ($errors->has('subject'))
                                        <span class="text-danger">
                                            {{ $errors->first('subject') }}
                                        </span>
                                    @endif
                                </label>
                                <input type="text" name="subject" id="subject" class="form-control"
                                       placeholder="Sujet *" value="{{ old('subject') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="message">
                                    @if ($errors->has('message'))
                                        <span class="text-danger">
                                            {{ $errors->first('message') }}
                                        </span>
                                    @endif
                                </label>
                                <textarea name="message" id="message" cols="30" rows="6" class="form-control"
                                          placeholder="Votre message *">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group form-check">
                                <input type="checkbox" name="copy" id="copy" class="form-check-input"
                                       value="checked" {{ old('copy') }}>
                                <label for="copy">M'envoyer une copie</label>
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
