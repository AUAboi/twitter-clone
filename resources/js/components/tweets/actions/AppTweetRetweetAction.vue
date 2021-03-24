<template>
	<div>
		<AppDropdown v-if="!retweeted">
			<template slot="trigger">
				<AppTweetRetweetActionButton :tweet="tweet" />
			</template>

			<AppDropdownItem @click.prevent="retweetOrUnretweet">
				Retweet
			</AppDropdownItem>
			<AppDropdownItem>
				Retweet with comment
			</AppDropdownItem>
		</AppDropdown>
		<!-- If not retweeted, unretweet on click -->
		<AppTweetRetweetActionButton
			@click.prevent="retweetOrUnretweet"
			v-else
			:tweet="tweet"
		/>
	</div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
	name: "AppTweetRetweetAction",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},
	computed: {
		...mapGetters({
			retweets: "retweets/retweets"
		}),

		retweeted() {
			return this.retweets.includes(this.tweet.id);
		}
	},
	methods: {
		...mapActions({
			retweetTweet: "retweets/retweetTweet",
			unretweetTweet: "retweets/unretweetTweet"
		}),

		retweetOrUnretweet() {
			if (this.retweeted) {
				this.unretweetTweet(this.tweet);
				return;
			}

			this.retweetTweets(this.tweet);
		}
	}
};
</script>