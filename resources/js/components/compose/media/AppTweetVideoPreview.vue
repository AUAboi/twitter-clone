<template>
	<div class="mb-4">
		<video
			controls
			preload
			:src="generateVideoPreview(video)"
			class="rounded-lg"
		></video>
	</div>
</template>

<script>
export default {
	name: "AppTweetVideoPreview",
	props: {
		video: {
			required: false,
			type: Array
		}
	},
	methods: {
		generateVideoPreview(video) {
			return URL.createObjectURL(video);
		}
	}
};
</script>

<style>
</style>