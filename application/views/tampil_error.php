<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="content-wrapper">

		<section class="content">
			<div id="notfound">
  				<div class="notfound">
    					<div class="notfound-404">
    						<h1>403</h1>
    					</div>
  					<hr>
  					<h4>Anda Tidak dizinkan mengakses halaman yang di tuju</h4>
  					<!-- <a href="welcome/dashboard/welcome">Silahkan refresh</a> -->
  					<hr>
  					<br>
  					 <a style="font-size:16px " href="<?php echo site_url('beranda') ?>"><i class="fa fa-sign-out"></i> Pergi Ke Beranda
             </a>
           </div>

				</div>

			</div>

		</section>
</div>
</body>


<style type="text/css">
	
body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}


#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

#notfound .notfound:after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50% , -50%);
      -ms-transform: translate(-50% , -50%);
          transform: translate(-50% , -50%);
  width: 100%;
  height: 600px;
  background-color: rgba(255, 255, 255, 0.7);
  -webkit-box-shadow: 0px 0px 0px 30px rgba(255, 255, 255, 0.7) inset;
          box-shadow: 0px 0px 0px 30px rgba(255, 255, 255, 0.7) inset;
  z-index: -1;
}

.notfound {
  max-width: 600px;
  width: 100%;
  text-align: center;
  padding: 30px;
  line-height: 1.4;
}

.notfound .notfound-404 {
  position: relative;
  height: 200px;
}

.notfound .notfound-404 h1 {
  font-family: 'Passion One', cursive;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 220px;
  margin: 0px;
  color: #222225;
  text-transform: uppercase;
}

.

</style>

</html>





