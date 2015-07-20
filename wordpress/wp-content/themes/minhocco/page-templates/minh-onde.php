<?php
/**
 * Template Name: Minhocco Onde
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */

 get_header();
 ?>
 
<body <?php body_class("pg-encontre pg-sub"); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">
     
    <?php
    /*
    O Conteúdo dessa página é uma galeria com uma div
    */
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          //the_content();
          //recuperando o código em html:
          $html = do_shortcode(get_the_content());
        endwhile; else: ?>
          
     <?php endif; ?>
     
         <div class="grid-onde">
      <div class="block-line colx6">
        <div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col local">
          <h1>Lago sul</h1>
          <div class="grid-onde-content">
            <ul class="block-line colx3">
              <li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li>
            </ul>
            <div class="fechar"></div>
          </div>
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div>
      </div>
      <div class="block-line colx6">
        <div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col local">
          <h1>Lago sul</h1>
          <div class="grid-onde-content">
            <ul class="block-line colx3">
              <li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li>
            </ul>
            <div class="fechar"></div>
          </div>
        </div><div class="col placeholder">
        </div>
      </div>
      <div class="block-line colx6">
        <div class="col local">
          <h1>Lago sul</h1>
          <div class="grid-onde-content">
            <ul class="block-line colx3">
              <li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 817 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 817 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 817 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li>
            </ul>
            <div class="fechar"></div>
          </div>
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div>
      </div>
      <div class="block-line colx6">
        <div class="col placeholder">
        </div><div class="col local">
          <h1>Lago sul</h1>
          <div class="grid-onde-content">
            <ul class="block-line colx3">
              <li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li><li class="col">
                <h2>Lorem Ipsum</h2>
                <address>
                  <div>
                    <span class="email hidden-txt">e-mail:</span> lorem@ipsum.com
                  </div>
                  <div>
                    <span class="telefone hidden-txt">telefone:</span> 99 9999 9999
                  </div>
                  <div>
                    <span class="endereco hidden-txt">endereço:</span> SLIN 999 bloco X lj 99
                  </div>
                  <div>
                    <span class="instagram hidden-txt">instagram:</span> @loremipsum
                  </div>
                </address>
              </li>
            </ul>
            <div class="fechar"></div>
          </div>
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div><div class="col placeholder">
        </div>
      </div>
    </div>
     
</main>

<?php
get_footer();