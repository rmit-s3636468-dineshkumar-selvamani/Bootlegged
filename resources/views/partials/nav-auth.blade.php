@section('contents')
<nav class="navbar navbar-auth navbar-expand-md navbar-dark fixed-top animated faded-In">
    <div class="container">
        <a class="navbar-brand-auth justify-content-center" href="/">
            <img src={{ asset('Images/logo_gold.png') }} width="80" height="auto" class="d-inline-block align-top float-none" alt=""> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-target="#navbar2SupportedContent">

        </button>
    </div>
</nav>

@section('script')
    <script type="text/javascript">
        $(document).scroll(function () {
            var height = $(".navbar").height();
            if ($(this).scrollTop() > 50) {
                $(".navbar").css("background-color", "black");
            } else {
                $(".navbar").css("background-color", "transparent");
            }
        });
    </script>