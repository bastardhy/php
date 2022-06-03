<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){

include('koneksi.php');

// dapatkan last id
$lastID = $_POST['id'];

// batasi penampilan data setelah scroll
$showLimit = 2;

$queryMember = "SELECT COUNT(*) as num_rows FROM as_members WHERE id_member < $lastID ORDER BY id_member ASC";
$sqlMember = mysqli_query($connect, $queryMember);
$dataMember = mysqli_fetch_array($sqlMember);
$allNumRows = $dataMember['num_rows'];

$query = "SELECT * FROM as_members WHERE id_member < $lastID ORDER BY id_member ASC LIMIT $showLimit";
$sql = mysqli_query($connect, $query);
$nums = mysqli_num_rows($sql);

if($nums > 0){
	while($data = mysqli_fetch_array($sql)){
		$memberID = $data['id_member']; ?>
		<div class="list-item"><a href="javascript:void(0);"><h2><?php echo $data['nama_lengkap']; ?></h2></a></div>
		<?php } ?>
		<?php if($allNumRows > $showLimit){ ?>
		<div class="load-more" lastID="<?php echo $memberID; ?>" style="display: none;">
			<img src="loading.gif"/>
		</div>
		<?php }else{ ?>
			<div class="load-more" lastID="0">
				That's All!
			</div>
	<?php }
    }
    else{ ?>
    	<div class="load-more" lastID="0">That's All!</div>
    <?php }
	}
?>