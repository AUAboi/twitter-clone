<template>
	<div class="flex w-full m-2">
		<div class="mr-3">
			<img :src="tweet.user.avatar" class="w-12 rounded-full" />
		</div>
		<div class="flex-grow">
			<AppTweetUsername :user="tweet.user" type="" />
			<p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

			<div>
				<AppTweet
					class="border border-gray-700 rounded-lg mt-4 mr-4"
					:tweet="tweet.original_tweet"
				/>
			</div>
		</div>
	</div>
</template>


<script>
export default {
	name: "AppTweetVariantTweet",
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