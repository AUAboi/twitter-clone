<template>
	<div class="w-full inline-block border-b border-gray-800 hover:bg-gray-800">
		<div class="flex w-full">
			<div class="mr-3">
				avatar
			</div>
			<div>
				<span class="text-gray-300 font-bold">{{ tweet.user.name }}</span>
				<span class="text-gray-600">@{{ tweet.user.username }}</span>
				<p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "AppTweet",
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