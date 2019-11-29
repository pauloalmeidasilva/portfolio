<!-- Core -->
<script type="text/javascript" src="<?=JS.'core/jquery-3.4.1.min.js'?>"></script>
<script type="text/javascript" src="<?=JS.'core/bootstrap.bundle.min.js'?>"></script>

<!-- Plugins -->
<script type="text/javascript" src="<?=JS.'plugins/sweetalert2.js'?>"></script>
<script type="text/javascript" src="<?=JS.'plugins/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?=JS.'plugins/dataTables.bootstrap4.min.js'?>"></script>

<!-- JS Exclusivo da página -->
<?php if (isset($scripts)) {
	foreach ($scripts as $script) {?>
		<script type="text/javascript" src="<?=JS.$script?>"></script>
	<?php }
} ?>
</body>
</html>
