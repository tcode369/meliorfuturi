<?php
session_start();
include('path.php');
$formok = "";
if ((isset($_POST['token'])) && hash_equals($_SESSION['token'], $_POST['token'])) {
	// Action if token is valid
	$formok = "1";
  } else {
	// Action if token is invalid
	$formok = "0";
	
  }
$_SESSION['token'] = bin2hex(random_bytes(24));  
if(isset($_POST['contact_me_by_fax_only']) && $_POST['contact_me_by_fax_only'] !="" )
   die();
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit']) && $formok == "1"){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'momimo unesite valjanu email adresu';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'info@web.vitacalma.com';
            $emailSubject = 'Primljeni upit od '.$name;
            $htmlContent = '<h2>Primljena poruka</h2>
                <h4>Ime</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Predmet</h4><p>'.$subject.'</p>
                <h4>Poruka</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = '<h3 style="font-family: K2D, sans-serif; color:#d05ce3;" > Hvala Vam na upitu! Javimo se uskoro.</h3>';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = '<h4 style="font-family: K2D, sans-serif; color:#d05ce3;" > Nije uspjelo! Molimo Vas probajte ponovno.</h4>';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>

<!doctype html>
<html lang="hr">
<head>
  
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133162937-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133162937-3');
</script>-->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N2HBTDW');</script>
<!-- End Google Tag Manager -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="hr-hr">
<meta name="description" content="Izrada responzivnih web stranica i SEO optimizacija | Oglašavanje na društvenim mrežama (Facebook, Instagram, LinkedIn) | Google Ads kampanje i oglašavanje na Youtube kanalima" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Add Material font (Roboto) and Material icon as needed -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@700;800;900&family=Montserrat:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
<link href="material.min.css" rel="stylesheet">

<link href="stylesheet.css?1.0" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="aos.css" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<link rel="canonical" href="https://www.web.vitacalma.com/">
<title>Izrada web stranica | SEO optimizacija | Online oglašavanje </title>
<meta property="og:title" content="Izrada web stranica | SEO optimizacija | Online oglašavanje " />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.web.vitacalma.com/" />
<meta property="og:image" content="https://www.web.vitacalma.com/img/web-logo1.jpg" />
<meta property="og:site_name" content="VitaCalma Web" />
<meta property="og:description" 
  content="Izrada responzivnih web stranica i SEO optimizacija | Oglašavanje na društvenim mrežama (Facebook, Instagram, LinkedIn) | Google Ads kampanje i oglašavanje na Youtube kanalima" />
<!-- JSON-LD oznaka koju je generirao Googleov Marker strukturiranih podataka. -->
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "https://www.web.vitacalma.com",
      "logo": "https://www.web.vitacalma.com/img/web-logo1.jpg"
    }
    </script>
</head>
 <body>

 <div class="container-fluid">
 <?php include(ROOT_PATH . '/header1.php') ?>

<div class="row">
    <div class="col-lg-7">
     <img src="./img/studio3.png" class="img-fluid mob-margina">

    </div>
    <div class="col-lg-5">
    <h1 class="text-left"> IZRADA WEB STRANICA <br /> <span class="treca">PO MJERI /></span></h1>
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class=" px-2 mt-5 btn filler3 okvir">ZATRAŽI PONUDU</button>
        <img src="img/potez.png" height="21px" width="210" class="pott">
        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalCenterTitle">ZATRAŽITE PONUDU</h2>
        <img src="img/potez.png" height="39px" width="180" class="pott2">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
           

      <div class="modal-body">
		   <form action="#kontakt" method="post">
		  <div class="form-group">
		  <label for="formInput1" class="siva pb-4">Vaše ime</label>    
		  <input type="text" name="name" class="form-control" id="formInput1" placeholder="Unesite ime" required="" >
		  </div>
		 
		  
		 
		  <div class="form-group font-weight-bold" >
		  <label for="formInput2" class="siva pb-4">E-mail adresa</label> 
		  <input type="email" name="email"  required pattern="^.+@.+$" id="formInput2" class="form-control" placeholder="Vaš email">
          
		  </div>
		  
		  
		  
		  
		  <div class="form-group font-weight-bold">
		  <label for="formInput3" class="siva pb-4">Naslov poruke</label>    
		   <input type="text" name="subject" class="form-control"  id="formInput3" required="" placeholder="Unesite naslov poruke">

		  </div>
		  
		 
		  <div class="form-group">
		  <input type="checkbox" name="contact_me_by_fax_only" id="contact_me_by_fax_only" value="1" style="display:none !important" tabindex="-1" autocomplete="off">

		  </div>
		  
		  
		  <div class="form-group font-weight-bold">
		  <label for="formInput4" class="siva pb-1">Vaša poruka...</label>     
		  <textarea name="message" class="form-control"  rows="3" id="formInput4" required=""  ></textarea>

		  </div>
		  
		  
		  
		 
		  
		  
		  </div>
	 
      
      <div class="form-groupm mt-5">
      <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">  
		  <button type="submit" name="submit" class="filler3 btn btn-lg  bottom-center1 font-weight-bold px-5 bg-4 "  class="form-control"  value="Pošalji"> POŠALJI</button>

      </div>
	   </form>
    </div>
  </div>
</div>
      </div>
      <div class="col-lg-3"></div>
    </div>
    </div>
</div>
 

 </div>
 
<section >
     <div class="container razmak">
        <div class="row ">
        <div class="col-lg-5 bann5"> 
        <img src="./img/onama1.png" class="img-fluid mt-5" data-aos="fade-up" data-aos-duration="1500">

        </div>
         <div class="col-lg-7">
         <h2 class="text-center mt-5 pt-5 bann1 "> UReD 81</h2>
             <p class="text-left  margina " >
            
          
              Vi imate ideju - mi imamo rješenje.
              U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
              oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
              sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
              omogućuje da samostalno unosite vlastitetreca materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
              Koristimo najnovije  

              </p>  
          
        </div>

         </div>
     </div>
 </section><br /><br /><br />  
<section>
<div class="container ">
  <div class="row my-5">
   
    <div class="col-lg-7">
    <h2 class="text-center mt-5 pt-5 bann1">IZRADA WEB STRANICA</h2>
    
    <p class="text-left margina" >
            
    Vi imate ideju - mi imamo rješenje.
            U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
            oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
            sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
            omogućuje da samostalno unosite vlastite materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
            Koristimo najnovije  <span class="druga font-weight-bold">_ _ _</span>
            </p>  
    </div>
    <div class="col-lg-5 bann3">
    <img src="./img/izrada-web-stranica1.png" class="img-fluid mob-margina mt-5">
    
    </div>
  </div>
  
  <div class="row razmak">
    <div class="col-lg-5 bann4">
    <img src="./img/webshop1.png" class="img-fluid mob-margina mt-5">
    </div>
    <div class="col-lg-7" >
    <h2 class="text-center mt-5 pt-5 bann1" >IZRADA WEB SHOP-a</h2>

    <p class="text-left margina" >
           
            Vi imate ideju - mi imamo rješenje.
            U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
            oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
            sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
            omogućuje da samostalno unosite vlastite materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
            Koristimo najnovije 
            </p> 
    </div>

  </div>
  <div class="row razmak">
     
    <div class="col-lg-7">
    <h2 class="text-center mt-5 pt-3 bann1">OGLAŠAVANJE NA DRUŠTVENIM MREŽAMA</h2>

    <p class="text-left margina" >
            
            Vi imate ideju - mi imamo rješenje.
            U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
            oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
            sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
            omogućuje da samostalno unosite vlastite materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
            Koristimo najnovije 
            </p>  
    </div>
   <div class="col-lg-5 bann4">
    <img src="./img/online-oglasavanje1.png" class="img-fluid mob-margina mt-5">
    </div>
  </div>
  <div class="row razmak" >
    <div class="col-lg-5 bann6">
    <img src="./img/seo-optimizacija1.png" class="img-fluid mob-margina mt-5">
    </div>
    <div class="col-lg-7" >
    <h2 class="text-center mt-5 pt-5 bann1" > SEO OPTIMIZACIJA</h2>

    <p class="text-left margina" >
           
            Vi imate ideju - mi imamo rješenje.
            U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
            oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
            sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
            omogućuje da samostalno unosite vlastite materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
            Koristimo najnovije 
            </p> 
    </div>

  </div>
  <div class="row razmak">
    
    <div class="col-lg-7" >
    <h2 class="text-center mt-5 pt-5 bann1 text-black" >HYDRA CMS</h2>

    <p class="text-left margina" >
           
            Vlastiti Content Management System.
            U suradnji sa vama izrađujemo za vas profesionalne responzivne web stranice i web shopove optimizirane za tražilice, 
            oglašavamo vas na internetu, pomažemo pri odabiru ključnih riječi i surađujemo sa vama tijekom cijelog procesa izrade, 
            sve kako bi vam pomogli da uspješno predstavite svoju tvrtku ili proizvode.<br />Izradili smo i vlastiti <span class="treca">HYDRA CMS</span> sustav koji vam nakon završene izrade web stranice 
            omogućuje da samostalno unosite vlastite materijale (tekstove, slike..) na vašu web stranicu kada god to poželite.
            Koristimo najnovije 
            </p> 
    </div>
    <div class="col-lg-5 bann8">
    <img src="./img/hydra.png" class="img-fluid mob-margina mt-5">
    </div>
  </div>
</div>

</div>
</section>
 
<div class="container-fluid mt-5" >
  
     <?php include(ROOT_PATH . '/footer.php') ?> 

  
</div>
 
 </body>   
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/CSSRulePlugin3.min.js"></script>
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/CSSRulePlugin.min.js"></script> -->
<script>

</script> 
<script src="script1.js"></script>
<script src="script.js"></script>
<script src="material.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="module">
    import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>


	<script src="aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>