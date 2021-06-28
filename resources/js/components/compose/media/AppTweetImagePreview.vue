<template>
	<div class="flex flex-wrap mb-4">
		<div
			v-for="(image, index) in images"
			:key="index"
			class="w-6/12 flex-grow relative"
		>
			<a
				href="#"
				@click.prevent="$emit('removed', image)"
				class="bg-gray-900 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex items-center justify-center"
			>
				<i class="far fa-window-close text-gray-300"></i>
			</a>
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