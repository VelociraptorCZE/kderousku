<template>
	<div>
		<div class="restriction-badges" ref="badges">
			<div :class="`${activeItems.includes(restrictionItem) ? 'active' : ''} restriction-badges__item`"
				 v-for="restrictionItem in restrictionList[activeCategory]"
				 @click="setActiveItems(restrictionItem)"
			>
				<img :src="imagePath(restrictionItem.image)" :alt="restrictionItem.name" class="m-2 restriction-badges__item--img">

				<span class="restriction-badges__item--header">{{ restrictionItem.name }}</span>
			</div>

			<h2 v-if="!restrictionList[activeCategory].length">
				{{ restrictionList.isLoading ? "Načítám..." : "Zde zatím nejsou žádná opatření" }}
			</h2>
		</div>

		<div ref="cards">
			<article v-for="activeItem in activeItems" v-if="!activeItem.showAllRestrictions">
				<div class="restriction-card" v-if="activeItems.length === 1">
					<div class="restriction-card__left">
						<img :src="imagePath(activeItem.image)"
							 :alt="activeItem.name"
							 class="restriction-card__right-img float-left"
						>
					</div>
					<div class="restriction-card__right">
						<div class="restriction-card__right-header">
							{{ activeItem.name }}
						</div>
						<div class="restriction-card__right-date">
						<span class="restriction-card__right-range">
							<span v-if="activeItem.start">{{ activeItem.start }} - </span> {{ activeItem.end }}
						</span>
							<span class="restriction-card__right-date-date-remain" v-if="activeItem.daysLeft">
							{{ activeItem.daysLeft }}
						</span>
						</div>
						<div class="restriction-card__right-description">
							{{ activeItem.info }}
						</div>
					</div>
				</div>

				<details class="small-restriction-card" v-else>
					<summary class="small-restriction-card__summary">
						<div class="d-flex p-3">
							<div class="small-restriction-card__left">
								<img :src="imagePath(activeItem.image)" :alt="activeItem.name">
							</div>
							<div class="small-restriction-card__right">
								<div class="small-restriction-card__right--header">{{ activeItem.name }}</div>
								<div class="small-restriction-card__right--date">
									<span v-if="activeItem.start">{{ activeItem.start }} - </span> {{ activeItem.end }}
								</div>
							</div>
						</div>
					</summary>
					<div class="small-restriction-card__content">
						{{ activeItem.info }}
					</div>
				</details>
			</article>
		</div>
	</div>
</template>

<script>
import imagePath from "../utils/imagePath";

export default {
	props: ["restrictionList", "activeCategory"],

	data () {
		return {
			activeItems: [],
		}
	},

	methods: {
		imagePath (path) {
			return imagePath(`/restrictions/${path}`);
		},

		setActiveItems (restrictionItem) {
			const { activeCategory, restrictionList } = this;

			this.activeItems = restrictionItem.showAllRestrictions ? restrictionList[activeCategory] : [restrictionItem];
			this.scrollToCard();
		},

		scrollToCard () {
			const { cards } = this.$refs;

			if (!cards || this.getBadgeContainerHeight() < innerHeight / 1.25) {
				return;
			}

			setTimeout(() => scroll(0, cards.offsetTop - 96), 10);
		},

		getBadgeContainerHeight () {
			return this.$refs.badges?.getBoundingClientRect()?.height;
		}
	}
}
</script>