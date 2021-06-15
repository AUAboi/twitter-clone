<template>
	<form @submit.prevent="submit" class="flex">
		<img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
		<div class="flex-grow">
			<AppTweetComposeTextarea
				v-model="form.body"
				placeholder="Add a comment"
			/>

			<div class="flex justify-between">
				<ul class="flex items-center"></ul>
				<div class="flex items-center justify-end">
					<div class="mr-2">
						<AppTweetComposeLimit :body="form.body" />
					</div>
					<button
						type="submit"
						class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
					>
						Retweet
					</button>
				</div>
			</div>
		</div>
	</form>
</template>

<script>
import axios from "axios";
import { mapActions } from "vuex";

import compose from "../../mixins/compose.js";

export default {
	name: "AppTweetRetweetCompose",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},
	mixins: [compose],
	methods: {
		...mapActions({
			quoteTweet: "timeline/quoteTweet"
		}),
		async post() {
			await this.quoteTweet({
				tweet: this.tweet,
				data: this.form
			});

			this.$emit("success");
		}
	}
};
</script>

<style>
</style>