<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="Public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Public/assets/Admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .form-select-lg {
       
        font-size: 1.25rem;
    }
    .form-control-user::placeholder {
        font-size: 0.8rem; /* Set font size for input placeholder text */
    }
    </style>
    <style>
        .background {
            background-color: #f5f0f0;
        }
    </style>

</head>

<body class="background">

    <div class="container px-5">

        <div class="card o-hidden border-0 shadow-lg " style="margin-left:200px;margin-right:200px;margin-top:50px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" 
                                        placeholder="First Name" id="fname">
                                </div>
                                <div id="fname-error">

                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-12 mt-3">
                                    <input type="text" class="form-control form-control-user" 
                                        placeholder="Last Name" id="lname">
                                </div>
                                <div id="lname-error">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mt-3">
                                    <input type="email" class="form-control form-control-user" 
                                    placeholder="Email Address" id="email">
                                </div>
                                <div id="email-error">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        placeholder="Password" id="pass">
                                </div>
                                <div id="pass-error">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mt-3">
                                    <input type="password" class="form-control form-control-user"
                                         placeholder="Repeat Password" id="rpass">
                                </div>
                                <div id="rpass-error">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mt-3">
                                <select class="form-select   rounded-pill"  style="color: #6e707e;" id="role">
                                <option selected>Select Role</option>
                                <?php
                                $arr = array(0 => "Admin", "User");
                               
                                foreach ($arr as $index => $value) {
                                ?>  
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                <?php
                                }
                                ?>
                            </select>
                                </div>
                                <div id="role-error">

                                </div>
                            </div>
                    </div>
                    <a href="login.html" class="btn btn-primary btn-user btn-block" id="Register">
                        Register Account
                    </a>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.html">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="Public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="Public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="Public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="Public/assets/Admin/js/sb-admin-2.min.js"></script>

</body>
<script>
    window.addEventListener("load",()=>{
            let fname=document.getElementById("fname");
            let lname=document.getElementById("lname");
            let email=document.getElementById("email");
            let pass=document.getElementById("pass");
            let rpass=document.getElementById("rpass");
            let role=document.getElementById("role");
            fnameError=document.getElementById(
                "fname-error"
            );
            lnameError=document.getElementById(
                "lname-error"
            );
            emailError=document.getElementById(
                "email-error"
            );
            passError=document.getElementById(
                "pass-error"
            );
            rpassError=document.getElementById(
                "rpass-error"
            );
            roleError=document.getElementById(
                "role-error"
            );
            role.addEventListener("focus",()=>{
                role.children[0].style.display="none";
            })
            fname.addEventListener("input",(e)=>{
                let fname=e.target.value;
                fnameError.innerHTML="";
                innerUnorderList=document.createElement("ul");
                fnameError.appendChild(innerUnorderList);
                nameRegex=/(?!.*\s+)(?!.*\d) [a-zA-z]{6}/;
                if(fname=="")
                {
                    innerList=document.createElement("li");
                    innerListText=document.createTextNode("field cant be empty");
                    innerList.appendChild(innerListText);
                    innerUnorderList.appendChild(innerList);
                    innerUnorderList.style.color="red";
                    innerUnorderList.style.marginLeft="30px";
                    console.log("name required");
                }
                else  if(!nameRegex.test(fname))
                {   
                        lengthRegex=/^[a-zA-z]{6}$/;
                        digitRegex=/\d/;
                        whitespaceRegex=/\s/;
                        if(!lengthRegex.test(fname)) 
                        {
                            let msg="only 6 character required";
                            nameValidation(msg,innerUnorderList);
                        }
                        if(digitRegex.test(fname))
                        {
                            let msg="no digits allowed";
                            nameValidation(msg,innerUnorderList);
                            
                        }
                        if(whitespaceRegex.test(fname))
                        {
                            let msg="no whitespace allowed";
                            nameValidation(msg,innerUnorderList);
                        }
                }
                else
                {
                    fnameError.innerHTML="";
                    console.log("regex passed");
                }
            });
            fname.addEventListener("blur",(e)=>{
                fnameError.innerHTML="";
            });
            document.querySelector("#Register").addEventListener("click",(e)=>{
                e.preventDefault();
            });
        function nameValidation(msg,innerUnorderList)
        {
            innerList=document.createElement("li");
            innerListText=document.createTextNode(msg);
            innerList.appendChild(innerListText);
            innerUnorderList.appendChild(innerList);
            innerUnorderList.style.color="red";
            innerUnorderList.style.marginLeft="30px";
        }   
    })
    
</script>
</html>