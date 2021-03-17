<template>
	<div>
		<div class="text-gray-600 font-medium text-xs mx-2 my-1 flex items-center">
			<i class="fas fa-retweet mx-2"></i>
			<span>{{ tweet.user.name }} retweeted</span>
		</div>
		<component
			:is="`app-tweet-variant-${tweet.original_tweet.type}`"
			:tweet="tweet.original_tweet"
		/>
	</div>
</template>


<script>
export default {
	name: "AppTweetVariantRetweet",
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