<template>
	<div>
		<div class="dynamic-tabs font-heading">
			<div :class="`dynamic-tabs__item ${categoryName === activeCategory ? 'active' : ''}`"
				 @click="activeCategory = categoryName"
				 v-for="(translation, categoryName) in categories"
			>
				{{ translation }}
			</div>
		</div>

		<RestrictionBadges :active-category="activeCategory" :restriction-list="restrictionList" />
	</div>
</template>

<script>
import regeneratorRuntime from "regenerator-runtime";
import RestrictionBadges from "./RestrictionBadges.vue";
import fetchDataFromApi, { RESTRICTION_LIST } from "../utils/fetchDataFromApi";

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
		const restrictionList = await fetchDataFromApi(RESTRICTION_LIST);

		if (restrictionList.current.length) {
			restrictionList.current.unshift({
				image: "question.svg",
				name: "Všechna opatření",
				showAllRestrictions: true
			});
		}

		this.restrictionList = restrictionList;
	}
}
</script>
