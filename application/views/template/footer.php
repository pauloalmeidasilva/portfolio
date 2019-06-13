<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<?php if (isset($scripts)) {
	foreach ($scripts as $script) {?>
		<script src="<?=JS.$script?>"></script>
	<?php }
} ?>
</body>
</html>
