@extends('layouts.app')
@section('content')
<!-- breadcrumb start -->
<section class="fag-breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2>{{ __('text.privacy') }}</h2>
                </div>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('text.privacy') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb End -->
<section class="fag-about-area section_100">
    <div class="container">
<div class="row" >
         <div class="col-sm-12">
          <p id="privacyFirstTitle">DATA CONTROLLER AND OWNER</p>
         <p id="privacySecondTitle">info@loverra.com</p>
        
        <p id="privacyFirstTitle">TYPES OF DATA COLLECTED</p>
         <p id="privacySecondTitle">The owner does not provide a list of Personal Data types collected.<br><br>

          Other Personal Data collected may be described in other sections of this privacy policy or by dedicated explanation text contextually with the Data collection. The Personal Data may be freely provided by the User, or collected automatically when using this Application.<br><br>

          Any use of Cookies - or of other tracking tools - by this Application or by the owners of third party services used by this Application, unless stated otherwise, serves to identify Users and remember their preferences, for the sole purpose of providing the service required by the User.<br><br>

          Failure to provide certain Personal Data may make it impossible for this Application to provide its services.<br><br>

          Users are responsible for any Personal Data of third parties obtained, published or shared through this Application and confirm that they have the third party's consent to provide the Data to the Owner.
          </p>

         <p id="privacyFirstTitle">MODE AND PLACE OF PROCESSING THE DATA</p>
         <p id="privacySecondTitle">Methods of processing<br>
          The Data Controller processes the Data of Users in a proper manner and shall take appropriate security measures to prevent unauthorized access, disclosure, modification, or unauthorized destruction of the Data.<br><br>

          The Data processing is carried out using computers and/or IT enabled tools, following organizational procedures and modes strictly related to the purposes indicated. In addition to the Data Controller, in some cases, the Data may be accessible to certain types of persons in charge, involved with the operation of the site (administration, sales, marketing, legal, system administration) or external parties (such as third party technical service providers, mail carriers, hosting providers, IT companies, communications agencies) appointed, if necessary, as Data Processors by the Owner. The updated list of these parties may be requested from the Data Controller at any time.<br><br>

          Place <br>
          The Data is processed at the Data Controller's operating offices and in any other places where the parties involved with the processing are located. For further information, please contact the Data Controller.<br><br>

          Retention time <br>
          The Data is kept for the time necessary to provide the service requested by the User, or stated by the purposes outlined in this document, and the User can always request that the Data Controller suspend or remove the data.
          </p>

         <p id="privacyFirstTitle">ADDITIONAL INFORMATION ABOUT DATA COLLECTION AND PROCESSING</p>
         <p id="privacySecondTitle">Legal action <br>
          The User's Personal Data may be used for legal purposes by the Data Controller, in Court or in the stages leading to possible legal action arising from improper use of this Application or the related services.<br><br>

          The User declares to be aware that the Data Controller may be required to reveal personal data upon request of public authorities.<br><br>

          Additional information about User's Personal Data<br>
          In addition to the information contained in this privacy policy, this Application may provide the User with additional and contextual information concerning particular services or the collection and processing of Personal Data upon request.<br><br>

          System Logs and Maintenance<br>
          For operation and maintenance purposes, this Application and any third party services may collect files that record interaction with this Application (System Logs) or use for this purpose other Personal Data (such as IP Address).<br><br>

          Information not contained in this policy<br>
          More details concerning the collection or processing of Personal Data may be requested from the Data Controller at any time. Please see the contact information at the beginning of this document.<br><br>

          The rights of Users<br>
          Users have the right, at any time, to know whether their Personal Data has been stored and can consult the Data Controller to learn about their contents and origin, to verify their accuracy or to ask for them to be supplemented, cancelled, updated or corrected, or for their transformation into anonymous format or to block any data held in violation of the law, as well as to oppose their treatment for any and all legitimate reasons. Requests should be sent to the Data Controller at the contact information set out above.<br><br>

          This Application does not support "Do Not Track" requests. To determine whether any of the third party services it uses honor the "Do Not Track" requests, please read their privacy policies.<br><br>

          Changes to this privacy policy<br>
          The Data Controller reserves the right to make changes to this privacy policy at any time by giving notice to its Users on this page. It is strongly recommended to check this page often, referring to the date of the last modification listed at the bottom. If a User objects to any of the changes to the Policy, the User must cease using this Application and can request that the Data Controller remove the Personal Data. Unless stated otherwise, the then-current privacy policy applies to all Personal Data the Data Controller has about Users.

          </p>

        
        </div>
 </div> 
</div>
</section>

@endsection