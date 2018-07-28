
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?php echo $assets['scripts'].'plugins.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'main.js'; ?>"></script>
<?php 
$path=$assets['scripts'];
?>

<!--script for display of cliked boxes in admin panel -->
<script type="text/javascript" src="<?php echo $path.'reveal-functions.js'; ?>"></script>
<!-- end -->

<script src="<?php echo $assets['scripts'].'lib/chart-js/Chart.bundle.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'dashboard.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'widgets.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'lib/vector-map/jquery.vmap.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'lib/vector-map/jquery.vmap.min.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'lib/vector-map/jquery.vmap.sampledata.js'; ?>"></script>
<script src="<?php echo $assets['scripts'].'lib/vector-map/country/jquery.vmap.world.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $path.'jquery.strengthify.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $path.'jquery.strengthify.js'; ?>"></script>
<script type="text/javascript">
  $('.password-field').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js'
        });
        $('.password-field-all').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: true,
            drawMessage: true
        });
        $('.password-field-minus-titles').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: false,
            drawMessage: true
        });
        $('.password-field-minus-message').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: true,
            drawMessage: false
        });
        $('.password-field-minus-bars').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: true,
            drawMessage: true,
            drawBars: false
        });
        $('.password-field-only-message').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: false,
            drawMessage: true,
            drawBars: false
        });
        $('.password-field-only-title').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            drawTitles: true,
            drawMessage: false,
            drawBars: false
        });
        $('.password-field-title-without-tooltip').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            tilesOptions:{
                tooltip: false,
                element: true
            },
            drawTitles: true,
            drawMessage: false,
            drawBars: true
        });
        $('.password-field-title-tooltip-element').strengthify({
            zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
            tilesOptions:{
                tooltip: true,
                element: true
            },
            drawTitles: true,
            drawMessage: false,
            drawBars: false
        });

</script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
</body>
</html>