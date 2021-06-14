<template>
	<div>
		<AppDropdown v-if="!retweeted">
			<template slot="trigger">
				<AppTweetRetweetActionButton :tweet="tweet" />
			</template>

			<AppDropdownItem @click.prevent="retweetOrUnretweet">
				Retweet
			</AppDropdownItem>
			<AppDropdownItem
				@click.prevent="$modal.show(AppTweetRetweetModal, { tweet })"
			>
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

import AppTweetRetweetModal from "../../modals/AppTweetRetweetModal.vue";

export default {
	name: "AppTweetRetweetAction",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},
	data() {
		return {
			AppTweetRetweetModal
		};
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

			this.retweetTweet(this.tweet);
		}
	}
};
</script>