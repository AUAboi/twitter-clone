<template>
	<ul class="flex mt-4">
		<li class="w-3/4">
			<AppTweetReplyAction />
		</li>
		<li class="w-3/4">
			<AppTweetRetweetAction />
		</li>
		<li class="w-3/4">
			<AppTweetLikeAction :tweet="tweet" />
		</li>
	</ul>
</template>

<script>
export default {
	name: "AppTweetActionGroup",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	}
};
</script>

<style>
</style>