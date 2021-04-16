<template>
	<div class="flex flex-wrap mb-4">
		<div
			v-for="(image, index) in images"
			:key="index"
			class="w-6/12 flex-grow relative"
		>
			<img class="rounded-lg" :src="generateImagePreview(image)" />
		</div>
	</div>
</template>

<script>
export default {
	name: "AppTweetImagePreview",
	props: {
		images: {
			required: false,
			type: Array
		}
	},
	methods: {
		generateImagePreview(image) {
			return URL.createObjectURL(image);
		}
	}
};
</script>

<style>
</style>