@include('layouts.master')

@section('content')
    <body>
    @include('sideNavBar')


    <div class="row">


    </div>
    <div class="container-fluid checkout-container">
        <div class="row">
            <div class="col-md-4">
                <img src="Images/reg_pic.jpg" name="about_pic" class="about_pic" style="height:10%; ">
            </div>
            <div class="col-md-4">
                <p>Test-Right</p>
            </div>

        </div>


    </div>
    @section('script')
        <script>
            $(function () {
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function () {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                }
            });
        </script>

    </body>