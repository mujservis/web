<?php
/**
 * Šablona pro zobrazení obsahu, když nejsou nalezeny žádné příspěvky
 *
 * @package Web
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nic nebylo nalezeno', 'web' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if ( is_search() ) :
            ?>
            <p><?php esc_html_e( 'Omlouváme se, ale nic neodpovídá vašim vyhledávacím kritériím. Zkuste to prosím znovu s jinými klíčovými slovy.', 'web' ); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php esc_html_e( 'Zdá se, že nemůžeme najít to, co hledáte. Možná vám pomůže vyhledávání.', 'web' ); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->