<template>
	<div>
		<div class="restriction-badges">
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
			<div class="card-restriction" ref="card">
				<div class="card-restriction__left">
					<img :src="activeItem.image" :alt="activeItem.name" class="card-restriction__right-img float-left">
				</div>
				<div class="card-restriction__right">
					<div class="card-restriction__right-header">
						{{ activeItem.name }}
					</div>
					<div class="card-restriction__right-date">
						<span class="card-restriction__right-range">{{ activeItem.start }} - {{ activeItem.end }}</span>
						<span class="card-restriction__right-date-date-remain" v-if="activeItem.daysLeft">
							Zbývají {{ activeItem.daysLeft }} dnů
						</span>
					</div>
					<div class="card-restriction__right-description">
						{{ activeItem.info }}
					</div>
				</div>
			</div>
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

				if (!card) {
					return;
				}

				setTimeout(() => {
					const { top } = card.getBoundingClientRect();
					scroll(0, top);
				}, 10);
			}
		}
	}
</script>