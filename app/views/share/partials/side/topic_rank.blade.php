{? $hot_topic = Ca\Service\TopicService::getTopicRank(Config::get('share.page_rank_document')) ?}
@if (count($hot_topic) > 0)
<div class="ranking_block">
	<h1>专题排行榜</h1>
	<table>
		@foreach ($hot_topic as $key => $topic)
			<tr>
				<td class="name">
					<span class="index_{{ $key }}">{{ $key + 1 }}</span>
					<a class="title" title="{{ $topic->name }}" href="{{ '/topic/detail?id=' . $topic->topicid }}">{{ $topic->name }}</a>
				</td>
				<td class="pages">{{ $topic->views }}</td>
			</tr>
		@endforeach
	</table>
</div>
<div class="clear"></div>
@endif