<template>
	<AppDropdown>
		<template slot="trigger">
			<AppTweetRetweetAction :tweet="tweet" />
		</template>

		<AppDropdownItem>
			Retweet
		</AppDropdownItem>
		<AppDropdownItem>
			Retweet with comment
		</AppDropdownItem>
	</AppDropdown>
</template>
