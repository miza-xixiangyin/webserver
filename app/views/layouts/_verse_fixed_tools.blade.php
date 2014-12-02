<?php
$all_authors_tmp = '';
if ($role) {
	$all_authors = FrontRole::getAuthorshipUser($role, $page_config);
	foreach ($all_authors as $user) {
		if ($user->id == $page_config['author_id']) continue;

		$all_authors_tmp .= <<<MARCUP
			<li class="user_item">
				<a class="verse_user verse_{$user->user_name}" href="{$user->link}">
					{$user->nick}
				</a>
			</li>
MARCUP;
	}

	if ($all_authors_tmp) {
		$all_authors_tmp = <<<MARCUP
			<div class="other_users verse_users_list">
				<ul class="users_list">
					{$all_authors_tmp}
				</ul>
			</div>
MARCUP;
	}

	echo $all_authors_tmp;
}
?>
<div class="fixed_bar">
	<?php //echo $all_authors_tmp ? '<a class="fixed_tool other_user"></a>' : ''; ?>
	<!-- <a class="fixed_tool fixed_share">分<br />享</a> -->
	<a class="fixed_tool fixed_top" href="#top">回<br />顶<br />部</a>
</div>