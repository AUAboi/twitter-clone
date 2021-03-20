<template>
	<a
		@click.prevent="likeOrUnlike"
		href="#"
		class="text-gray-600 flex items-center text-base"
	>
		<i :class="liked ? 'text-red-600' : ''" class="far fa-heart mx-2"></i>
		<span :class="liked ? 'text-red-600' : ''">{{ tweet.likes_count }}</span>
	</a>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
	name: "AppTweetLikeAction",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},

	methods: {
		...mapMutations({
			SET_LIKES: "timeline/SET_LIKES"
		}),
		...mapActions({
			likeTweet: "likes/likeTweet",
			unlikeTweet: "likes/unlikeTweet"
		}),

		likeOrUnlike() {
			Echo.channel("tweets").listen(".TweetLikesWereUpdated", e => {
				this.SET_LIKES(e);
			});

			if (this.liked) {
				this.unlikeTweet(this.tweet);
				return;
			}

			this.likeTweet(this.tweet);
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