@include('layouts.master')
@extends('partials.nav-bar')

@section('title')
    Bootlegged: Welcome
@endsection

@section('content')
    <div class="py-5 text-center section-parallax" >
        <div class="container py-5 mr-auto">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="mb-4 text-light text-left display-4 text-w1">Welcome to</h1>
                    <h1 class="mb-4 text-light text-left display-3 text-w2">Bootlegged</h1>
                    <p class="lead mb-5 text-light text-left description-container">Bootlegged is a peer to peer
                        marketplace where buyers and
                        sellers of alcoholic</p>

                    <p>
                        <a href="{{URL::to('login')}}" class="btn draw-border btn-login btn-lg float-left"
                           role="button">Login <i
                                    class="fas fa-angle-right"></i><i
                                    class="fas fa-angle-right"></i><i
                                    class="fas fa-angle-right"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5" id="register">
        <div class="container container2">
            <div class="row">
                <div class="col-md-7 ">
                    <img class="img-fluid d-block side01" src="/Images/About.png"></div>
                <div class="col-md-5 side01content">
                    <div class="interested text-left">
                        Interested?
                        <br>Register with us below!</br>

                    </div>

                    <div>
                        <a role="button" class="btn btn-lg btn-primary text-dark btn-registerman" href="/registerman"><i class="fas fa-industry"></i> Register as
                            Manufacturer</a>
                    </div>

                    <div>
                        <a role="button" class="btn btn-lg btn-primary text-dark btn-registersto" href="/registersto"><i class="fas fa-store"></i> Register as
                            Store Manager</a>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <div class="py-5 section-parallax" id="faq">
        <div class="container my-5 bg-light p-4">
            <div class="row mx-auto">
                <div class="col-md-12">
                    <div class="mb-3 faq">Things that you would ask about...</div>
                    <p class="" style="background: #D3BC3F;"><i class="fas fa-question-circle"></i> Why should I purchase stock on BOOTLEGGED?</p>
                    <p>BOOTLEGGED offers pricing below cost in order to move stock quickly. As stock approaches expiry
                        prices will drop. BOOTLEGGED has inventory information relating to more outlets in Australia
                        than any other marketplace.
                        BOOTLEGGED connects shop owners and suppliers across a network. BOOTLEGGED may be used as an
                        alternate supply chain for supplier out stocks, manufacturer cannot supply lines and
                        discontinued lines.</p>
                    <p class="" style="background: #D3BC3F;"><i class="fas fa-question-circle"></i> What stock can I list on BOOTLEGGED?</p>
                    <p class="">Any retail products and on-premise bulk sold in retail liquor and on-premise
                        locations. Cold chain can be listed but at this stage no delivery option is available through
                        the marketplace. The seller must arrange cold chain supply and ensure supply does not breach
                        cold chain requirements for that product.</p>
                    <p class="" style="background: #D3BC3F;"><i class="fas fa-question-circle"></i> What fees are charged by BOOTLEGGED?</p>
                    <p class="">A low $10 monthly fee for free stock transfers, free to list unlimited items for
                        sale and free to buy. A 5% commission fee (ex GST) plus the credit card fee is applied to each
                        transaction (ex GST). If an item list price exceeds $100 then the commission is CAPPED AT $5 per
                        item over $100. There is no minimum commission.</p>
                    <p class="" style="background: #D3BC3F;"><i class="fas fa-question-circle"></i> How do I pay for stock bought on BOOTLEGGED?</p>
                    <p class="">BOOTLEGGED uses a trusted third-party, Stripe, to provide integrated online
                        merchant services for all standard and premium domestic credit cards.</p>
                    <p class="" style="background: #D3BC3F;"><i class="fas fa-question-circle"></i> How secure is the information I provide upon registration?</p>
                    <p class="">The BOOTLEGGED platform is hosted in a Sydney-based data centre using Amazon Web
                        Services. Our system applies industry standard security practices to ensure that data is
                        securely managed. We use SSL to ensure that data transferred between our data centre and you is
                        encrypted.</p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

@section('script')
    <script type="text/javascript">
        $(document).scroll(function () {
            var height = $(".navbar").height();
            if ($(this).scrollTop() > 450) {
                $(".navbar").css("background-color", "black");
            } else {
                $(".navbar").css("background-color", "transparent");
            }
        });

        $(document).ready(function () {
            $("#myCarousel").on("slide.bs.carousel", function (e) {
                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 4;
                var totalItems = $(".carousel-item").length;

                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide - (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        // append slides to end
                        if (e.direction == "left") {
                            $(".carousel-item")
                                .eq(i)
                                .appendTo(".carousel-inner");
                        } else {
                            $(".carousel-item")
                                .eq(0)
                                .appendTo($(this).find(".carousel-inner"));
                        }
                    }
                }
            });
        });

        var Messenger = function(el){
            'use strict';
            var m = this;

            m.init = function(){
                m.codeletters = "&#*+%?£@§$";
                m.message = 0;
                m.current_length = 0;
                m.fadeBuffer = false;
                m.messages = [
                    'This is a message, which can be long and all.',
                    'This could be another message.',
                    'Also short ones work!',
                    'Cool.'
                ];

                setTimeout(m.animateIn, 100);
            };

            m.generateRandomString = function(length){
                var random_text = '';
                while(random_text.length < length){
                    random_text += m.codeletters.charAt(Math.floor(Math.random()*m.codeletters.length));
                }

                return random_text;
            };

            m.animateIn = function(){
                if(m.current_length < m.messages[m.message].length){
                    m.current_length = m.current_length + 2;
                    if(m.current_length > m.messages[m.message].length) {
                        m.current_length = m.messages[m.message].length;
                    }

                    var message = m.generateRandomString(m.current_length);
                    $(el).html(message);

                    setTimeout(m.animateIn, 20);
                } else {
                    setTimeout(m.animateFadeBuffer, 20);
                }
            };

            m.animateFadeBuffer = function(){
                if(m.fadeBuffer === false){
                    m.fadeBuffer = [];
                    for(var i = 0; i < m.messages[m.message].length; i++){
                        m.fadeBuffer.push({c: (Math.floor(Math.random()*12))+1, l: m.messages[m.message].charAt(i)});
                    }
                }

                var do_cycles = false;
                var message = '';

                for(var i = 0; i < m.fadeBuffer.length; i++){
                    var fader = m.fadeBuffer[i];
                    if(fader.c > 0){
                        do_cycles = true;
                        fader.c--;
                        message += m.codeletters.charAt(Math.floor(Math.random()*m.codeletters.length));
                    } else {
                        message += fader.l;
                    }
                }

                $(el).html(message);

                if(do_cycles === true){
                    setTimeout(m.animateFadeBuffer, 50);
                } else {
                    setTimeout(m.cycleText, 2000);
                }
            };

            m.cycleText = function(){
                m.message = m.message + 1;
                if(m.message >= m.messages.length){
                    m.message = 0;
                }

                m.current_length = 0;
                m.fadeBuffer = false;
                $(el).html('');

                setTimeout(m.animateIn, 200);
            };

            m.init();
        }

        console.clear();
        var messenger = new Messenger($('#messenger'));
    </script>
@endsection
