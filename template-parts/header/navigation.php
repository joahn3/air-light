<?php
/**
 * Navigation layout.
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:22:26
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2020-08-11 15:04:17
 *
 * @package air-light
 */

namespace Air_Light;

// Accessible labels
if ( function_exists( 'pll_the_languages' ) && function_exists( 'ask_e' ) ) {
  if ( 'fi' === pll_current_language() ) {
    $screenreadertext_expand_toggle = ask__( 'Saavutettavuus: Avaa päävalikko' );
  } else {
    $screenreadertext_expand_toggle = ask__( 'Accessibility: Open main menu' );
  }
} else {
  if ( 'fi' === get_bloginfo( 'language' ) ) {
    $screenreadertext_expand_toggle = esc_html__( 'Avaa päävalikko', 'air-light' );
  } else {
    $screenreadertext_expand_toggle = esc_html__( 'Open main menu', 'air-light' );
  }
}
?>

<div class="main-navigation-wrapper" id="main-navigation-wrapper">

  <!-- NB! Accessibility: Add/remove has-visible-label class for button if you want to enable/disable visible "Show menu/Hide menu" label for seeing users -->
  <button aria-controls="nav" id="nav-toggle" class="nav-toggle hamburger has-visible-label" type="button" aria-label="<?php echo esc_html( $screenreadertext_expand_toggle ); ?>">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
    <span id="nav-toggle-label" class="nav-toggle-label"><?php echo esc_html( $screenreadertext_expand_toggle ); ?></span>
  </button>

  <nav id="nav" class="nav-primary">

    <?php
      if ( function_exists( 'pll_the_languages' ) && function_exists( 'ask_e' ) ) {
        if ( 'fi' === pll_current_language() ) {
          $nav_label = ask__( 'Saavutettavuus: Päävalikko' );
        } else {
          $nav_label = ask__( 'Accessibility: Main navigation' );
        }
      } else {
        if ( 'fi' === get_bloginfo( 'language' ) ) {
          $nav_label = esc_html( 'Päävalikko' );
        } else {
          $nav_label = esc_html( 'Accessibility: Main navigation' );
        }
      }

      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'depth'          => 4,
        'menu_class'     => 'menu-items',
        'menu_id'        => 'main-menu',
        'echo'           => true,
        'fallback_cb'    => __NAMESPACE__ . '\Nav_Walker::fallback',
        'items_wrap'     => '<ul role="menu" aria-label="' . $nav_label . '" id="%1$s" class="%2$s">%3$s</ul>',
        'walker'         => new Nav_Walker(),
      ) );
      ?>

  </nav><!-- #nav -->
</div>
