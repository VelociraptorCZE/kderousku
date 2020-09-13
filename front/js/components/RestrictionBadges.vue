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
		</div>

		<article v-if="activeItem !== null">
			<div class="card-restriction">
				<div class="card-restriction__left">
					<img :src="activeItem.image" :alt="activeItem.name" class="card-restriction__right-img float-left">
				</div>
				<div class="card-restriction__right">
					<div class="card-restriction__right-header">
						{{ activeItem.name }}
					</div>
					<div class="card-restriction__right-date">
						<span class="card-restriction__right-range">01.09. 2020 - 20.09. 2020</span>
						<span class="card-restriction__right-date-date-remain">Zbyvaji 2 dny</span>
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
		}
	}
</script>