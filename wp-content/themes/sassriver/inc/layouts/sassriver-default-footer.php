<?php

function sassriver_default_footer() {
    ?>
    <footer class="fti-footer-3-area bg-default tx-footer tx-defaultFooter">
        <div class="container fti-container-8">
            <p class="fti-copyright-3 m-0"><?php if(function_exists('sassriver_copyright_text')) {sassriver_copyright_text();} ?></p>
        </div>
    </footer>
<?php

}