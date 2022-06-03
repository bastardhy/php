<html>
<head>
	<title>NICEDIT</title>
</head>
<body>

<script src="../nicEdit.js"></script>

<script>
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<h4>First Textarea</h4>
<textarea name="area1" cols="40"></textarea>
<br />

<h4>Second Textarea</h4>
<textarea name="area2" style="width: 100%;">
	Some Initial Content was in this textarea
</textarea>
<br />

<h4>Third Textarea</h4>
<textarea name="area3" style="width: 300px; height: 100px;">
	HTML <b>content</b> <i>default</i> in textarea
</textarea>

</body>
</html>