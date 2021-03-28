<template>
	<form @submit.prevent="submit" class="flex">
		<div class="mr-3">
			<img :src="$user.avatar" class="w-12 rounded-full" />
		</div>
		<div class="flex-grow">
			<AppTweetComposeTextarea v-model="form.body" />
			<div class="flex justify-between">
				<div></div>
				<div class="flex items-center justify-end">
					<div>
						<AppTweetComposeLimit />
					</div>
					<button
						type="submit"
						class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
					>
						Tweet
					</button>
				</div>
			</div>
		</div>
	</form>
</template>

<script>
import axios from "axios";

export default {
	name: "AppTweetCompose",
	data() {
		return {
			form: {
				body: ""
			}
		};
	},
	methods: {
		async submit() {
			if (this.form.body === "") {
				return;
			}
			await axios.post("api/tweets", this.form);
			this.form.body = "";
		}
	}
};
</script>

<style>
</style>