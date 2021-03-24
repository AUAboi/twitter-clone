<template>
	<AppDropdown>
		<template slot="trigger">
			<AppTweetRetweetAction :tweet="tweet" />
		</template>

		<AppDropdownItem>
			Retweet
		</AppDropdownItem>
		<AppDropdownItem>
			Retweet with comment
		</AppDropdownItem>
	</AppDropdown>
</template>

<script>
import { mapGetters } from "vuex";

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
	}
};
</script>