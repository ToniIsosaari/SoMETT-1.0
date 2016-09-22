<!-- Mikäli haluat työsi toimivan lisää scriptisi tänne  -->
<script src="http://cosmo.kpedu.fi/~miiahuvila/somett/SoMETT-1.0/SoMETT/node_modules/foundation-sites/vendor/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script>
<script>
      $(document).foundation();
</script>
<script>
      $(document).ready(function(){
        $(".apua").click(function(){
          $(".help").toggle(1000);
        });
      });
</script>
<!-- kommentointi skriptit-->
  <script>
  function openWin() {
    window.location.href = "kommentointi_login.php";
  }
  </script>
          <script src="js/jquery.min.js"></script>
        <script src="js/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/readmore.js"></script>
               <script>
$('p#kommentti').readmore({
  moreLink: '<a href="#" class="more">Näytä enemmän <i class="fi-arrow-down"></i></a>',
  lessLink: '<a href="#" class="less">Näytä vähemmän <i class="fi-arrow-up"></i></a>',
});
        </script>
        <!-- kommentointi skriptit -->
