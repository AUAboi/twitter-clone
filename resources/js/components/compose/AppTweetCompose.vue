<template>
	<form @submit.prevent="submit" class="flex">
		<img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
		<div class="flex-grow">
			<AppTweetComposeTextarea v-model="form.body" />
			<span class="text-gray-600">{{ media }}</span>

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
			//this will get ids for uploaded media
			let media = await this.uploadMedia();

			this.form.media = media.data.data.map(r => r.id);
			
			await axios.post("/api/tweets", this.form);

			this.form.body = "";
			this.form.media = [];
			this.media.video = null;
			this.media.images = []
		},

		async uploadMedia() {
			return await axios.post("/api/media", this.buildMediaForm(), {
				headers: {
					"Content-Type": "multipart/form-data"
				}
			});
		},
		buildMediaForm() {
			let form = new FormData();

			if (this.media.images.length) {
				this.media.images.forEach((image, index) => {
					form.append(`media[${index}]`, image);
				});
			}
			if (this.media.video) {
				form.append("media[0]", this.media.video);
			}

			return form;
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
		},

		removeVideo() {
			this.media.video = null;
		},

		removeImage(image) {
			//Loops through all images and return
			// every i where i != image clicked for removal
			this.media.images = this.media.images.filter(i => {
				return image != i;
			});
		}
	},
	mounted() {
		this.getMediaTypes();
	}
};
</script>

<style>
</style>