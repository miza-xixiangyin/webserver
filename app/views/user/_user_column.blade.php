<?php
$pages = ConPage::where('author_id', '=', $user->id)->orderBy('id', 'DESC')->get();
?>
<div class="user_timeline user_column">
	<ul class="ut_list">
		@foreach($pages as $page)
		<li class="ut_item">
			<div class="ut_block">
				<div class="ut_content">
					<p>
						{{ $page->desc }}
					</p>
				</div>
				<span class="ut_date">{{ $page->date() }}</span>
			</div>
		</li>
		@endforeach
	</ul>
</div>