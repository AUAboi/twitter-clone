<template>
	<div>
		<div @click="open = !open">
			<slot name="trigger" />
		</div>
		<div
			v-show="open"
			class="absolute bg-gray-900 z-50 rounded-lg w-56 overflow-hidden"
		>
			<slot />
		</div>
	</div>
</template>

<script>
export default {
	name: "AppDropdown",
	data() {
		return {
			open: false
		};
	}
};
</script>

<style>
</style>