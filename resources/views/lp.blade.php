@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">

    <div id="leftColn" class="col-md-6 text-center">
      <img src="/images/logo_medical.png" width="300px" alt="Medical Beauty | Mallorca" style="margin-top: 200px;"><br>
      <img src="/images/difference.png" width="300px" alt="see the difference" style="margin-top: 40px;">


      <section id="formControl">

        <h1>BIENVENIDOS<br>HERZLICH WILLKOMMEN<br>WELCOME</h1>

        <p class="text-justify">{{ __('content.p') }}<br><br>{{ __('content.p2') }}</p>

        @if ($resultMessage = Session::get('success'))
        <div class="alert alert-success" role="alert">
          <p class="formAlert">{{ $resultMessage }}</p>
        </div>
        @endif

        <form action="/submit" method="post" id="lead-form" data-parsley-validate="">
          {{ csrf_field() }}

          <div class="form-group">
            <input class="form-control" type="text" name="leadName" value="" placeholder="{{ __('content.formFirstname') }}" data-parsley-trigger="change" required="">
          </div>
          <div class="form-group">
            <input class="form-control" type="email" name="leadMail" value="" placeholder="{{ __('content.formEmail') }}" data-parsley-trigger="change" required="">
          </div>
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="button">{{ __('content.formSubmit') }}</button>
          <p class="formSecurity"><img src="/images/securityIcon.png" style="margin-right: 5px;">{{ __('content.formSecurity') }}</p>
        </form>

        <a href="https://www.steigenberger.com/hotels/alle-hotels/spanien/camp-de-mar-mallorca/steigenberger-golf-spa-resort" target="_blank">
          <p>&copy; Steigenberger Golf & Spa Resort</p>
        </a>
      </section>

    </div>

    <div id="rightColn" class="col-md-6">
    </div>

  </div><!-- END ROW -->
</div><!-- END CONTAINER -->
@endsection
