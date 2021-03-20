<template>
	<a href="" class="text-gray-600 flex items-center text-base">
		<i :class="liked ? 'text-red-600' : ''" class="far fa-heart mx-2"></i>
		<span :class="liked ? 'text-red-600' : ''">{{ tweet.likes_count }}</span>
	</a>
</template>

<script>
import { mapGetters } from "vuex";

export default {
	name: "AppTweetLikeAction",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},

	computed: {
		...mapGetters({
			likes: "likes/likes"
		}),

		liked() {
			//check if users like includes this tweet
			return this.likes.includes(this.tweet.id);
		}
	}
};
</script>