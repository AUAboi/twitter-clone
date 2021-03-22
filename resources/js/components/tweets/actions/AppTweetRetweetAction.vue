<template>
	<AppDropdown>
		<template slot="trigger">
			<a href="#" class="text-gray-600 flex items-center text-base">
				<i class="fas fa-retweet mx-2"></i>
				<span>0</span>
			</a>
		</template>

		<AppDropdownItem>
			Retweet
		</AppDropdownItem>
		<AppDropdownItem>
			Retweet with comment
		</AppDropdownItem>
	</AppDropdown>
</template>