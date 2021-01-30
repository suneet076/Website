<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>carepetvet.000webhostapp.com</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mob").blur(function() {
                var exp = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                var resp = exp.test(mob);
                if (resp == false) {
                    $("#errmob").html("Invalid Mobile Number");
                } else {
                    $("#errmob").html("Valid Mobile Number");
                }
            });
            $("#btnfpass").click(function() {
                var uid = $("#uidfpass").val();
                var url = "ajax-user-save.php?uid=" + uid + "&tablename=fpass";
                $.get(url, function(response) {
                    $("#errfpass").html(response);
                });
            });
            $("#btnlogin").click(function() {
                var uid = $("#uidlogin").val();
                var pass = $("#pass").val();
                var url = "ajax-user-save.php?uid=" + uid + "&tablename=userlogin&pass=" + pass;
                $.get(url, function(response) {
                    if (response == "Doctor") {
                        location.href = "doctor-front.php";
                    } else if (response == "Pharmacy") {
                        location.href = "pharmacy-front.php";
                    } else if (response == "Citizen") {
                        location.href = "citizen-front.php";
                    } else if (response == "Shelter Provider") {
                        location.href = "shelter-front.php";
                    } else {
                        $("#errlogin").html(response);
                    }
                });
            });
            $("#btnsignup").click(function() {
                var qstring = $("#signupfrm").serialize();
                var url = "ajax-user-save.php?" + qstring + "&tablename=user";
                $.get(url, function(response) {
                    $("#errsignup").html(response);
                });
            });
            $("#eye").click(function() {
                if ($("#pass").attr("type") == "password") {
                    $("#pass").attr("type", "text");
                    $("#eye").addClass("fa-eye").removeClass("fa-eye-slash");
                } else if ($('#pass').attr("type") == "text") {
                    $("#pass").attr("type", "password");
                    $("#eye").addClass("fa-eye-slash").removeClass("fa-eye");
                }
            });
            $("#eyesign").click(function() {
                if ($("#passsign").attr("type") == "password") {
                    $("#passsign").attr("type", "text");
                    $("#eyesign").addClass("fa-eye").removeClass("fa-eye-slash");
                } else if ($('#passsign').attr("type") == "text") {
                    $("#passsign").attr("type", "password");
                    $("#eyesign").addClass("fa-eye-slash").removeClass("fa-eye");
                }
            });
            $("#fpwd").click(function() {
                $("#login").modal('hide');
            });

        });

    </script>
    <style>
        a,
        a:hover {
            color: black;
        }

        .field-icon {
            float: right;
            margin-right: 10px;
            margin-top: -25px;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark pointer-event" style="background:#5CDB95">
        <a class="navbar-brand h6" href="#">
            <i class="fa fa-paw fa-2x"></i>PetCare
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse expand-lg" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item mr-2">
                    <a class="nav-link h5" data-target="#login" data-toggle="modal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link h5" data-target="#signup" data-toggle="modal">Signup</a>
                </li>

            </ul>
        </div>

    </nav>
    <div class="modal" id="login" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content " style="background:#5CDB95">
                <div class="modal-header">
                    <h5 class="modal-title offset-md-4"><i class="fa fa-sign-in fa-1x"></i>&nbsp;Login Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="container">
                        <center><img src="pics/petcare.jpg" height="160" width="160" style="  border-radius: 50%;" alt=""></center>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="uidlogin" class="h6">User Id</label>
                                <input type="text" class="form-control" id="uidlogin" name="uidlogin" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="pass" class="h6">Password</label>
                                <input type="password" class="form-control" id="pass" name="pass">
                                <i id="eye" class="fa fa-eye-slash field-icon form-group" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" id="btnlogin" name="btnlogin">Login</button>
                        </div>
                        <br>
                        <a data-target="#fpass" data-toggle="modal" id="fpwd" class="offset-md-8">Forget Password!</a>
                        <div class="text-center">
                            <small id="errlogin"></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="fpass" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content " style="background:#5CDB95">
                <div class="modal-header">
                    <h5 class="modal-title offset-md-4"><i class="fa fa-sign-in fa-1x"></i>&nbsp;Forget Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="container">
                        <center><img src="pics/petcare.jpg" height="160" width="160" style="  border-radius: 50%;" alt=""></center>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-2">
                                <label for="uidlogin" class="h6">User Id</label>
                                <input type="text" class="form-control" id="uidfpass" name="uidfpass" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" id="btnfpass" name="btnfpass">Send</button>
                        </div>
                        <br>
                        <div class="text-center">
                            <small id="errfpass"></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="signup" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background:#5CDB95">
                <div class="modal-header ">
                    <h5 class="modal-title offset-md-4"><i class="fa fa-user-plus"></i>&nbsp;Signup Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form id="signupfrm">
                        <br>
                        <center><img src="pics/petcare.jpg" height="160" width="160" style="  border-radius: 50%;" alt=""></center>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="uidsignup" class="h6">User Id</label>
                                <input type="text" class="form-control" id="uidsignup" name="uidsignup" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="passsign" class="h6">Password</label>
                                <input type="password" class="form-control" id="passsign" name="passsign">
                                <i id="eyesign" class="fa fa-eye-slash field-icon form-group" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="mob" class="h6">Mobile No</label>
                                <input type="text" class="form-control" id="mob" name="mob">
                                <small id="errmob" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="prof" class="h6">Profession</label>
                                <select id="prof" name="prof" class="form-control h6">
                                    <option selected>Choose...</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Citizen">Citizen</option>
                                    <option value="Shelter Provider">Shelter Provider</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 offset-md-3">
                                <button type="button" class="btn btn-primary form-control h6" id="btnsignup" name="btnsignup">SignUp</button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 offset-4 ">
                                <small id="errsignup"></small>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide form-control-range" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pics/dogunsplash.jpg" style="height:400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/dog1.jpg" style="height:400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/pvet1.jpg" style="height:400px" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <nav class="navbar navbar-dark mt-2" style="background-color:#5CDB95;">
        <a class="navbar-brand mx-auto"><b>OUR SERVICES</b></a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mt-3" style="background:#5CDB95;color:white">
                    <img src="pics/shelter1.png" class="card-img-top form-control-file" alt="...">
                    <div class="card-body text-center form-control-file">
                        <h5 class="card-title">Shelter Provider</h5>
                        <p class="card-text ">"Sheltering that one animal, the world will change forever."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mt-3" style="background:#5CDB95;color:white">
                    <img src="pics/pharmacy.jpg" class="card-img-top form-control-file" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pharmacy</h5>
                        <p class="card-text ">The Best and most efficient Pharmacy is within your own system.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mt-3">
                    <img src="pics/shop-512.png" class="card-img-top form-control-file" alt="...">
                    <div class="card-body text-center" style="background:#5CDB95;color:white">
                        <h5 class="card-title">Buy Pet</h5>
                        <p class="card-text">"Explore your favourite pet and get the actual love in your life."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mt-3">
                    <img src="pics/sellpet.jpg" class="card-img-top form-control-file" alt="...">
                    <div class="card-body text-center" style="background:#5CDB95;color:white">
                        <h5 class="card-title">Sell Pet</h5>
                        <p class="card-text">where you can provide a best partners and family for your pets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark mt-2" style="background-color:#5CDB95;">
        <a class="navbar-brand mx-auto"><b>Meet The Developers</b></a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <div class="card mt-3" style="background:#5CDB95;">
                    <img src="pics/suneet.jpg" class="card-img-top" alt="...">
                    <div class="card-body table-responsive text-center" style="color:white;">
                        <h5 class="card-title">Developed By</h5>
                        <div class="card-text">
                            <table class="table" style="color:white;">
                                <tr>
                                    <th>Name</th>
                                    <td>Suneet Kumar
                                    <td>
                                </tr>
                                <tr>
                                    <th>College</th>
                                    <td>Thapar institute of engineering and technology
                                    <td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>9780854480
                                    <td>
                                </tr>
                                <tr>
                                    <th>Linkedin Profile</th>
                                    <td><a href="https://www.linkedin.com/in/suneet-kumar-1947b6148/" style="color:white">https://www.linkedin.com/in/suneet-kumar-1947b6148/</a>
                                    <td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mt-3" style="background:#5CDB95;">
                    <img src="pics/sirrealjava.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center table-responsive">
                        <h5 class="card-title" style="color:white">Under the Guidance of</h5>
                        <div class="card-text ">
                            <table class="table" style="color:white">
                                <tr>
                                    <th>Name</th>
                                    <td>Rajesh bansal</td>
                                </tr>
                                <tr>
                                    <th>Owner At</th>
                                    <td>Banglore Computer Education Bathinda
                                    <td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>9872246056</td>
                                </tr>
                                <tr>
                                    <th>Linkedin Profile</th>
                                    <td><a href="https://www.linkedin.com/in/rajesh-scjp-bansal-8a87251a" style="color:white">https://www.linkedin.com/in/rajesh-scjp-bansal-8a87251a</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark mt-2" style="background-color:#5CDB95;">
        <a class="navbar-brand mx-auto"><b>Reach US</b></a>
    </nav>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.9041288991307!2d74.95029191459768!3d30.211283617627757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f880032d%3A0x89c6142e92cd8fc1!2sReal%20Java%20Book%20Head%20Office!5e0!3m2!1sen!2sin!4v1602320930328!5m2!1sen!2sin" width="100%" height="450" frameborder="0" class="mt-2" style="border:0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <nav class="navbar navbar-dark" style="background-color:#5CDB95;">
        <marquee behavior="" direction="" style="color:white;"><b>Copyright<i class="fa fa-copyright" aria-hidden="true">All Rights Reserved</i></b></marquee>
    </nav>
</body>

</html>
