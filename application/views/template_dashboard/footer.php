<!-- Core -->
<script src="<?=JS.'core/jquery-3.4.1.min.js'?>"></script>
<script src="<?=JS.'core/bootstrap.bundle.min.js'?>"></script>

<!-- Plugin -->
<script src="<?=JS.'plugins/sweetalert2.js'?>"></script>

<!-- JS Exclusivo da página -->
<?php if (isset($scripts)) {
	foreach ($scripts as $script) {?>
		<script src="<?=JS.$script?>"></script>
	<?php }
} ?>
</body>
</html>
