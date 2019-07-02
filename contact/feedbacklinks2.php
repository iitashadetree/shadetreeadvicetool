<!--POP UP AND FEED BACK FILES-->
<script type="text/javascript" src="../js/jspopup/jscript.js"></script>
<script type="text/javascript" src="../js/jspopup/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../js/jspopup/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="../js/jspopup/jquery.validationEngine-fr.js"></script>
<script>
    $(document).ready(function() {
      // SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
      $("#form1").validationEngine({
        ajaxSubmit: true,
          ajaxSubmitFile: "ajaxSubmit.php",
          ajaxSubmitMessage: "Thank you, We will contact you soon !",
        success :  false,
        failure : function() {}
      })
    });
</script>
      
<link rel="stylesheet" type="text/css" href="../css/stylepopup.css" />
<link rel="stylesheet" type="text/css" href="../css/validationEngine.jquery.css" />

<title>Contact Us</title>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','js/analytics.js','ga');

  ga('create', 'UA-47210639-1', 'w3course.com');
  ga('send', 'pageview');
</script>
<!--CLOSE POP UP AND FEED BACK FILES-->