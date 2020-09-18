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
                {{ activeItem.daysLeft }}
              </span>
            </div>
            <div class="card-restriction__right-description">
<!--              {{ activeItem.info | truncate(10, '...')}}-->
              {{ activeItem.info }}
            </div>
          </div>
        </div>

<!--         SMALL CARDS-->
        <div class="container-cards-small">
          <details>
            <summary>
              <div class="container-cards-small">
                <div class="card-restriction-small__left">
                  <img :src="activeItem.image" :alt="activeItem.name">
                </div>
                <div class="card-restriction-small__right">
                  <div class="card-restriction-small__right-header-date">
                  <div class="summary-title">{{ activeItem.name }}</div>
                  <div class="card-restriction-small__right-date">{{ activeItem.start }} - {{ activeItem.end }}</div>
                  </div>
                </div>
                <div class="summary-chevron-up">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
              </div>
            </summary>
            <div class="summary-content">{{ activeItem.info }}</div>
            <div class="summary-chevron-down">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg>
            </div>
          </details>
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
			// this.scrollToCard();
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