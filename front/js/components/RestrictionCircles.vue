<template>
	<section>
		<div class="restriction-circles">
			<div :class="`${circle === activeItem ? 'active' : ''} restriction-circles__item`"
				 v-for="circle in circles"
				 @click="activeItem = circle"
			>
				<img :src="circle.image" :alt="circle.name" class="m-4">

				<span class="restriction-circles__item--header">{{ circle.name }}</span>
			</div>
		</div>

		<article v-if="activeItem !== null" class="m-3">
			<h2>{{ activeItem.name }}</h2>

			<p>
				<img :src="activeItem.image" :alt="activeItem.name" class="m-2 float-left">
				{{ activeItem.info }}
			</p>
		</article>
	</section>
</template>

<script>
	export default {
		data () {
			return {
				activeItem: null,
				circles: [
					{
						id: 1,
						name: "MHD",
						image: "public/img/mhd.svg",
						info: "Ministerstvo zdravotnictví dnes vydalo mimořádná opatření k pravidlům pro nošení roušek, karanténu a hromadné akce s účinností od 1. září. Roušky budou povinné, jak už ministerstvo oznámilo dříve, ve zdravotnických a sociálních zařízeních, úřadech, prostředcích veřejné dopravy a volebních místnostech. Od 1. září se také zkrátí izolace pro lidi s pozitivním testem na covid-19 a karanténa pro ty, kteří se s nimi dostali do kontaktu, ze 14 na deset dní."
					},
					{
						id: 2,
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						id: 3,
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						id: 4,
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						id: 5,
						name: "MHD",
						image: "public/img/mhd.svg"
					}
				]
			}
		}
	}
</script>