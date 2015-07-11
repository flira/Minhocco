<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<footer class="body-footer">
    <div class="encap">
      <form id="newsletter" class="newsletter">
        <h1>Fique atento às novidades!</h1>
        <input class="newsletter-email" id="newsletter-email" placeholder="e-mail" />
        <input class="newsletter-submit" type="submit" value="inscreva-se" />
      </form>
      <div class="site-map">
        <nav>
          <ul class="site-map-list">
            <li class="site-map-lvl1">
              <h1><a href="/" class="icon-minhocco" id="map-1" title="minhocco">início</a></h1>
            </li>
            <li class="site-map-lvl1">
              <h1><a id="map-2" href="">universo minhocco</a></h1>
              <ul>
                <li class="site-map-lvl2"><a id="map-3" href="">a minhocco</a>
                </li>
                <li class="site-map-lvl2"><a id="map-4" href="">equipe</a>
                </li>
                <li class="site-map-lvl2"><a id="map-5" href="">turminha</a>
                </li>
              </ul>
            </li>
            <li class="site-map-lvl1">
              <h1><a id="map-6" href="">guarda-roupa</a></h1>
            </li>
            <li class="site-map-lvl1">
              <h1><a id="map-7" href="">parque</a></h1>
              <ul>
                <li class="site-map-lvl2"><a id="map-8" href="">jogos</a>
                </li>
                <li class="site-map-lvl2"><a id="map-9" href="">estorinhas</a>
                </li>
              </ul>
            </li>
            <li class="site-map-lvl1">
              <h1><a id="map-10" href="">contato</a></h1>
              <ul>
                <li class="site-map-lvl2"><a id="map-11" href="">fale conosco</a>
                </li>
                <li class="site-map-lvl2"><a id="map-12" href="">trabalhe conosco</a>
                </li>
                <li class="site-map-lvl2"><a id="map-13" href="">lojas</a>
                </li>
                <li class="site-map-lvl2"><a id="map-14" href="">franquias</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <div class="social-medias">
        <nav>
          <ul>
            <li><a class="icon-facebook" title="facebook" href="">facebook</a>
            </li>
            <li><a class="icon-pokeball" title="instagram" href="">instagram</a>
            </li>
            <li><a class="icon-pinterest" title="pinterest" href="">pinterest</a>
            </li>
            <li><a class="icon-youtube" title="youtube" href="">youtube</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/scripts/main.js"></script>
  <!--<script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-62996854-1', 'auto');
    ga('send', 'pageview');
  </script>-->
  <!-- Built with love using Google Toolkit -->
	<?php wp_footer(); ?>
</body>
</html>