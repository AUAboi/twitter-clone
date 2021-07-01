<template>
	<a
		href="#"
		class="text-gray-600 flex items-center text-base"
		@click.prevent="$modal.show(AppTweetReplyModal, { tweet })"
	>
		<i class="far fa-comment mx-2"></i>

		<span>{{ tweet.reply_count }}</span>
	</a>
</template>

<script>
import AppTweetReplyModal from "../../modals/AppTweetReplyModal";

export default {
	props: {
		tweet: {
			required: true,
			type: Object
		}
	},
	data() {
		return {
			AppTweetReplyModal
		};
	}
};
</script>