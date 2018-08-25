<?php
wp_footer(); ?>
<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.1/jquery.detect_swipe.min.js"></script>
<script>
    $(document).ready(function(){
        $('.gallery').featherlightGallery({
            gallery: {
                next: 'suivant »',
                previous: '« précédant'
            },
            previousIcon: '<',
            nextIcon: '>'
        });
        $('.gallery2').featherlightGallery({
            gallery: {
                next: 'next »',
                previous: '« previous'
            },
            variant: 'featherlight-gallery2'
        });
    });
</script>