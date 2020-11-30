
<?php if ( isset( $data['ciudades'] ) ) { ?>

    <script>
        var geoJson = <?php echo json_encode( $data['ciudades'] ); ?>;
    </script>

<?php } ?>

<script src="<?php echo $data['site_url']; ?>/assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php echo $data['site_url']; ?>/assets/js/plugins.js"></script>
<script src="<?php echo $data['site_url']; ?>/assets/js/main.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
</body>

</html>