<template>
	<form @submit.prevent="submit" class="flex">
		<img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
		<div class="flex-grow">
			<AppTweetComposeTextarea
				v-model="form.body"
				:placeholder="'Whats happening?'"
			/>
			<AppTweetMediaProgress
				class="mb-4"
				:progress="media.progress"
				v-if="media.progress"
			/>

			<AppTweetImagePreview
				:images="media.images"
				v-if="media.images.length"
				@removed="removeImage"
			/>
			<AppTweetVideoPreview
				:video="media.video"
				v-if="media.video"
				@removed="removeVideo"
			/>

			<div class="flex justify-between">
				<ul class="flex items-center">
					<li class="mr-4">
						<!--id is prop to determine if button is for reply or tweet -->

						<AppTweetComposeMediaButton
							@selected="handleSelectedMedia"
							id="media-compose"
						/>
					</li>
				</ul>
				<div class="flex items-center justify-end">
					<div class="mr-2">
						<AppTweetComposeLimit :body="form.body" />
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

import compose from "../../mixins/compose.js";

export default {
	name: "AppTweetCompose",
	mixins: [compose],
	methods: {
		async post() {
			axios.post("/api/tweets", this.form);
		}
	}
};
</script>

<style>
</style>