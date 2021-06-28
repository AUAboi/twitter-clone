<template>
	<div>
		<input
			type="file"
			:id="id"
			class="hidden"
			@change="$emit('selected', $event.target.files)"
			multiple
		/>
		<label :for="id">
			<i class="far fa-images text-blue-500 w-6 text-lg cursor-pointer"></i>
		</label>
	</div>
</template>

<script>
export default {
	name: "AppTweetComposeMediaButton",
	props: {
		id: {
			required: true,
			type: String
		}
	}
};
</script>
