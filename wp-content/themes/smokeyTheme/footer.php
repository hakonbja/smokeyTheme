

  </div> <!-- content -->
  <?php if ( !is_front_page() ) { ?>
  <a class="back-to-front" href="<?php echo home_url(); ?>"><i class="fa arrow-left"></i>Back to front page</a>
  <?php } ?>

  <footer>
    <div class="footer--styling sloped-top">
        <div class="copyright">
          <div class="social">
            <a href="https://www.facebook.com/Smokey-Feet-181498711899234/" target="_blank" class="fa fa-facebook-square"></a>
            <a href="https://www.youtube.com/channel/UCZF0ieyE0i8lNCQx1YzXMgw/" target="_blank" class="fa fa-youtube"></a>
          </div>

          <p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y');?></p>
        </div>

        <div class="contact">
          <p>Stichting Smokey Feet</p>
          <p>Mendelhof 8-II</p>
          <p>1098 TP Amsterdam</p>
          <p>The Netherlands</p>
          <p>KvK: 64013359</p>
          <p>IBAN: NL31 TRIO 0254 7452 45</p>
        </div>
    </div>
  </footer>

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111842302-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111842302-2');
</script>
</body>
</html>
