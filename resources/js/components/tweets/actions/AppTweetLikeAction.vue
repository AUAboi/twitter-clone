<template>
	<a href="" class="text-gray-600 flex items-center text-base">
		<i class="far fa-heart mx-2"></i>
		<span>
			{{ tweet.likes_count }}
		</span>
	</a>
</template>

<script>
export default {
	name: "AppTweetLikeAction",
	props: {
		tweet: {
			required: true,
			type: Object
		}
	}
};
</script>