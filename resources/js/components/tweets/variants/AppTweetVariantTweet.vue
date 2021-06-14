<template>
	<div class="flex w-full m-2">
		<img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full" />
		<div class="flex-grow">
			<AppTweetUsername :user="tweet.user" />
			<p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

			<div class="flex flex-wrap mb-4 mt-4" v-if="images.length">
				<div
					class="w-6/12 flex-grow"
					v-for="(image, index) in images"
					:key="index"
				>
					<img :src="image.url" class="rounded-lg" />
				</div>
			</div>

			<div v-if="video" class="my-4">
				<video :src="video.url" controls class="rounded-lg"></video>
			</div>

			<AppTweetActionGroup :tweet="tweet" />
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
	},
	computed: {
		images() {
			return this.tweet.media.data.filter(m => m.type === "image");
		},

		video() {
			return this.tweet.media.data.filter(m => m.type === "video")[0];
		}
	}
};
</script>

<style>
</style>