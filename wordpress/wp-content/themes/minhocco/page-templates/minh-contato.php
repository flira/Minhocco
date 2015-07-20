<?php
/**
 * Template Name: Minhocco Contato
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class("pg-sub pg-encontre"); ?>>
  <?php echo get_template_part("menu", "geral");?>
  <main class="body-main" role="main">
     <?php
    /*
    O Conteúdo dessa página são duas galerias. Vamos assim separá-las em duas partes.
    */
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        $conteudo = get_the_content();
        $html = minhocco_contato_separa_conteudo($conteudo);  
        $parte_superior = minhocco_contato_main_superior($html[0]);
        $parte_inferior = minhocco_contato_main_inferior($html[1]);
        endwhile; else: ?>
          
     <?php endif; ?>
    <div class="block-line address">
    <div class="panel-left">
      <?php echo $parte_superior; ?>
      <div class="arara"></div>
    </div><div class="panel-right">
      <iframe class="address-map" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=-15.7867101%2C-47.9136503&key=AIzaSyDxYCIWXc81V-cLcd40JULGclFFGfCxbYQ" allowfullscreen></iframe>
    </div>
  </div>
  <div class="block-line form-encap">
    <h1>Quer falar com a gente?</h1>
    <form class="contato-form" action="" method="post">
      <div class="block-line colx2">
        <div class="col">
          <label>nome: <input name="contato-nome"/></label>
        </div><div class="col">
          <label>e-mail: <input name="contato-email"/></label>
        </div>
      </div>
      <div class="block-line colx1">
        <div class="col">
          <label>
            assunto:
            <select name="contato-assunto">
              <option value="administrativo">administrativo</option>
              <option value="atendimento">atendimento loja</option>
              <option value="estilo">estilo</option>
              <option value="franquias">franquias</option>
              <option value="marketing">marketing</option>
              <option value="multimarcas">multimarcas</option>
              <option value="outras">outras</option>
            </select>
          </label>
        </div>
      </div>
      <div class="block-line colx1">
        <div class="col">
          <label>
            mensagem:
            <textarea name="contato-mensage" rows="3"></textarea>
          </label>
        </div>
      </div>
      <input class="contato-enviar" type="submit" name="contato-enviar" value="enviar"/>
    </form>
    <div class="onca">
      <address class="mensagem">
        <!--você também pode mandar um email para <a href="mailto:ola@minhocco.com.br">ola@minhocco.com.br</a>-->
        <?php echo $parte_inferior; ?>
      </address>
    </div>
  </div>
  </main>

<?php
get_footer();
