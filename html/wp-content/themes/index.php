<div class="postnav">
<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
<div class="prev"><?php next_posts_link(__('? Previous Entries')) ?></div>
<div class="next"><?php previous_posts_link(__('Next Entries ?')) ?></div> <?php } ?>
</div>