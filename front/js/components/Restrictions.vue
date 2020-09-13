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
import restrictionList from "../../../public/restriction-list-response.json";
import RestrictionBadges from "./RestrictionBadges.vue";

export default {
	components: {
		RestrictionBadges
	},

	data: function () {
		return {
			restrictionList,
			categories: {
				current: "Aktuální opatření",
				upcoming: "Nadcházející opatření"
			},
			activeCategory: "current"
		};
	}
}
</script>
