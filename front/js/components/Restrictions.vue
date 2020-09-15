<template>
	<section>
		<div class="dynamic-tabs font-heading">
			<div :class="`dynamic-tabs__item ${categoryName === activeCategory ? 'active' : ''}`"
				 @click="activeCategory = categoryName"
				 v-for="(translation, categoryName) in categories"
			>
				{{ translation }}
			</div>
		</div>

		<RestrictionBadges :active-category="activeCategory" :restriction-list="restrictionList" />
	</section>
</template>

<script>
import regeneratorRuntime from "regenerator-runtime";
import RestrictionBadges from "./RestrictionBadges.vue";

export default {
	components: {
		RestrictionBadges
	},

	data () {
		return {
			restrictionList: {
				isLoading: true,
				current: [],
				upcoming: []
			},
			categories: {
				current: "Aktuální opatření",
				upcoming: "Nadcházející opatření"
			},
			activeCategory: "current"
		};
	},

	async beforeMount () {
		const restrictionListResponse = await fetch("api/restriction-list");

		this.restrictionList = await restrictionListResponse.json();
	}
}
</script>
