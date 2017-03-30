<?php

if($db) {
	$result = $db->prepare('UPDATE images set img_view_cnt = img_view_cnt + 1 WHERE id=:id');
	$result->bindParam(':id', $img_id);
	$result->execute();
	
	$result = $db->prepare('SELECT img_view_cnt as cnt FROM images WHERE id=:id');
	$result->execute([':id' => $img_id]);
	$response = $result->fetchColumn();
}
?>