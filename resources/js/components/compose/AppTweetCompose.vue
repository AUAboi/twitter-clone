<template>
	<form @submit.prevent="submit" class="flex">
		<img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
		<div class="flex-grow">
			<AppTweetComposeTextarea v-model="form.body" />
			<span class="text-gray-600">{{ media }}</span>

			<AppTweetImagePreview :images="media.images" v-if="media.images.length" />
			<AppTweetVideoPreview :video="media.video" v-if="media.video" />

			<div class="flex justify-between">
				<ul class="flex items-center">
					<li class="mr-4">
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

export default {
	name: "AppTweetCompose",
	data() {
		return {
			form: {
				body: "",
				media: []
			},
			media: {
				images: [],
				video: null
			},
			mediaTypes: {}
		};
	},
	methods: {
		async submit() {
			if (this.form.body === "") {
				return;
			}
			await axios.post("api/tweets", this.form);
			this.form.body = "";
		},

		async getMediaTypes() {
			let res = await axios.get("/api/media/types");
			this.mediaTypes = res.data.data;
		},

		handleSelectedMedia(files) {
			//files will give list of files
			Array.from(files)
				.slice(0, 4)
				.forEach(file => {
					if (this.mediaTypes.image.includes(file.type)) {
						this.media.images.push(file);
					}
					if (this.mediaTypes.video.includes(file.type)) {
						this.media.video = file;
					}
				});

			if (this.media.video) {
				this.media.images = [];
			}
		}
	},
	mounted() {
		this.getMediaTypes();
	}
};
</script>

<style>
</style>