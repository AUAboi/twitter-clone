<template>
	<a
		@click.prevent="handleClick"
		href="#"
		class="block py-3 px-4 text-gray-300 hover:bg-gray-800"
	>
		Retweet
	</a>
</template>

<script>
export default {
	name: "AppDropdownItem",
	methods: {
		handleClick(e) {
			this.$emit("click", e);
			this.$parent.close();
		}
	}
};
</script>