<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CKEditor</title>
		<!-- Pastikan file path yang dituju benar -->
		<script src="ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<form>
			<textarea name="editor" id="editor" rows="10" cols="80">
				Ini adalah textarea yang telah diganti menggunakan bantuan CKEditor
			</textarea>
			<script>
				// Ganti <textarea id="editor1"> dengan CKEditor
				// ini adalah konfigurasi secara default
				CKEDITOR.replace( 'editor' );
			</script>
		</form>
	</body>
</html>