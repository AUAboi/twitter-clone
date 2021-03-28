<template>
	<div class="h-10 w-10 relative">
		<svg viewBox="0 0 120 120">
			<circle
				cx="60"
				cy="60"
				fill="none"
				stroke-width="8"
				:r="radius"
				class="stroke-current text-gray-700"
			/>
			<circle
				cx="60"
				cy="60"
				fill="none"
				stroke-width="8"
				:r="radius"
				class="stroke-current text-blue-500"
				:stroke-dasharray
			/>
		</svg>
	</div>
</template>

<script>
export default {
	name: "AppTweetComposeLimit",
	data() {
		return {
			radius: 30
		};
	},
	computed: {
		dash() {
			//to get diameter for dash/cut
			return 2 * Math.PI * this.radius;
		}
	}
};
</script>

<style>
</style>