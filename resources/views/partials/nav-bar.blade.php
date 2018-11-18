@section('contents')
<nav class="navbar navbar-expand-md navbar-dark fixed-top animated faded-In" >
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src={{ asset('Images/logo_gold.png') }} width="80" height="auto" class="d-inline-block align-top float-left" alt=""> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-md-start" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active ">
                    <a class="nav-link text-white" href="#login">Login</a>
                <li class="nav-item active ">
                    <a class="nav-link text-white" href="#register">Register</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link text-white" href="#faq">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@section('script')
<script type="text/javascript">
    $(document).scroll(function () {
        var height = $(".navbar").height();
        if ($(this).scrollTop() > 470) {
            $(".navbar").css("background-color", "black");
        } else {
            $(".navbar").css("background-color", "transparent");
        }
    });
</script>