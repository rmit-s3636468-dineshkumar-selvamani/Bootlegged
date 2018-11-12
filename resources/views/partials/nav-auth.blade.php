<nav class="navbar navbar-expand-md navbar-dark fixed-top animated faded-In" id="navbar">
    <div class="container">
        <a class="navbar-brand-auth" href="/">
            <img src={{ asset('Images/logo_gold.png') }} width="80" height="auto" class="d-inline-block align-top float-left" alt=""> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-150px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>