<template>
	<AppDropdown>
		<template slot="trigger">
			<a
				:class="retweeted ? 'text-green-600' : ''"
				href="#"
				class="text-gray-600 flex items-center text-base"
			>
				<i class="fas fa-retweet mx-2"></i>
				<span>{{ tweet.retweets_count }}</span>
			</a>
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