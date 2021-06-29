<template>
	<a href="" class="text-gray-600 flex items-center text-base">
		<i class="far fa-comment mx-2"></i>

		<span>{{ tweet.reply_count }}</span>
	</a>
</template>

<script>
export default {
	props: {
		tweet: {
			required: true,
			type: Object
		}
	}
};
</script>