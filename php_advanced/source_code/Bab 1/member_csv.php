<H1>Import Data CSV</H1>
		
<form method="POST" action="import_csv.php" enctype="multipart/form-data">
<table border="1" cellpadding="5" cellspacing="5" style="width: 100%;">
	<tr valign="top">
		<td width="120">File Import</td>
		<td width="10">:</td>
		<td><input type="file" name="filename" style="width: 300px;" required></td>
	</tr>
	<tr>
		<td colspan="3">
			<button type="submit" name="submit">IMPORT</button>
		</td>
	</tr>
</table>	
</form>

Export Member : <a href="export_csv.php">Export Member</a>