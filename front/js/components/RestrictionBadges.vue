<template>
	<div>
		<div class="restriction-badges" ref="badges">
			<div :class="`${restrictionItem === activeItem ? 'active' : ''} restriction-badges__item`"
				 v-for="restrictionItem in restrictionList[activeCategory]"
				 @click="activeItem = restrictionItem"
			>
				<img :src="restrictionItem.image" :alt="restrictionItem.name" class="m-2 restriction-badges__item--img">

				<span class="restriction-badges__item--header">{{ restrictionItem.name }}</span>
			</div>

			<h2 v-if="!restrictionList[activeCategory].length">
				{{ restrictionList.isLoading ? 'Načítám...' : 'Tady nic není' }}
			</h2>
		</div>

		<article v-if="activeItem !== null">
			<div class="restriction-card" ref="card">
				<div class="restriction-card__left">
					<img :src="activeItem.image" :alt="activeItem.name" class="restriction-card__right-img float-left">
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

			<!--
		  <div>
			<details class="small-restriction-card">
			  <summary class="small-restriction-card__summary">
				<div class="d-flex p-3">
				  <div class="small-restriction-card__left">
					<img :src="activeItem.image" :alt="activeItem.name">
				  </div>
				  <div class="small-restriction-card__right">
					  <div class="small-restriction-card__right--header">{{ activeItem.name }}</div>
					  <div class="small-restriction-card__right--date">{{ activeItem.start }} - {{ activeItem.end }}</div>
				  </div>
				</div>
			  </summary>
			  <div class="small-restriction-card__content">
				  {{ activeItem.info }}
			  </div>
			</details>
		  </div>SMALL CARD -->
		</article>
	</div>
</template>

<script>
export default {
	props: ["restrictionList", "activeCategory"],

	data () {
		return {
			activeItem: null,
		}
	},

	updated () {
		this.scrollToCard();
	},

	methods: {
		scrollToCard () {
			const { card } = this.$refs;

			if (!card || this.getBadgeContainerHeight() < innerHeight / 1.25) {
				return;
			}

			setTimeout(() => scroll(0, card.offsetTop - 96), 10);
		},

		getBadgeContainerHeight () {
			return this.$refs.badges?.getBoundingClientRect()?.height;
		}
	}
}
</script>