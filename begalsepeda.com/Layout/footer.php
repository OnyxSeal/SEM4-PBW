
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Footer Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
    }
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }
    .container{
        max-width: 1170px;
        margin:auto;
    }
    .row{
        display: flex;
        flex-wrap: wrap;
    }
    ul{
        list-style: none;
    }
    .footer{
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #263545;
        padding: 70px 0;
    }
    .footer-col{
    width: 25%;
    padding: 0 15px;
    }
    .footer-col h4{
        font-size: 18px;
        color: #ffffff;
        text-transform: capitalize;
        font-weight: 500;
        position: relative;
  		transform: translateY(-20px);
    }
    .footer-col h4::before{
        content: '';
        position: absolute;
        left:0;
        background-color: #e91e63;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
  		transform: translateY(30px);
    }
    .footer-col ul li a{
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #bbbbbb;
        display: block;
        transition: all 0.3s ease;
    }
    .footer-col .social-links a{
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255,255,255,0.2);
        margin:0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
    }
    .footer-col .social-links a:hover{
        color: #24262b;
        background-color: #ffffff;
    }

    .iconSos{
        margin: 12px 0px 0px 0px;
    }

    /*responsive*/
    @media(max-width: 767px){
    .footer-col{
        width: 50%;
        margin-bottom: 30px;
    }
    }
    @media(max-width: 574px){
    .footer-col{
        width: 100%;
    }
    }

    .cr{
        padding-top: 8px;
        text-align: center;
        transform: translateY(75px);
        background-color: #1c2733;
        font-size: 12px;
        height: 30px;
    }

</style>

<body>

  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>follow me</h4>
  	 			<div class="social-links">
  	 				<a href="https://github.com/OnyxSeal" target=_b><i class="fab fa-github iconSos"></i></a>
  	 				<!-- <a href="#"><i class="fab fa-twitter iconSos"></i></a> -->
  	 				<a href="https://www.instagram.com/vall.rar" target=_b><i class="fab fa-instagram iconSos"></i></a>
  	 				<!-- <a href="#"><i class="fab fa-linkedin-in iconSos"></i></a> -->
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
     <div class="cr">
        Copyright Raival Ganteng
     </div>
  </footer>

</body>
</html>