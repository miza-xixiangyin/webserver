<?php
$all_authors_tmp = '';
if ($role) {
	$all_authors = FrontRole::getAuthorshipUser($role, $page_config);
	foreach ($all_authors as $user) {
		if ($user->id == $page_config['author_id']) continue;

		$all_authors_tmp .= <<<MARCUP
			<li class="user_item">
				<a class="user_wrap ym-contain-oh" href="{$user->link}">
					<img class="user_image" src="/uploads/user/w-50/{$user->image}">
					<div class="user_info">
						<span class="user_name">{$user->nick}</span>
						<span class="user_title">{$user->vocation}</span>
					</div>
				</a>
			</li>
MARCUP;
	}

	if ($all_authors_tmp) {
		$all_authors_tmp = <<<MARCUP
			<div class="other_users">
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