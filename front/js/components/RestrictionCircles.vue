<template>
	<section>
		<div class="restriction-circles">
			<div :class="`${circle === activeItem ? 'active' : ''} restriction-circles__item`"
				 v-for="circle in circles"
				 @click="activeItem = circle"
			>
				<img :src="circle.image" :alt="circle.name" width="86px" height="86px" class="m-4">

				<span class="restriction-circles__item--header">{{ circle.name }}</span>
			</div>
		</div>

    <div class="container-cards">
		  <article v-if="activeItem !== null" class="m-3 card">

        <div class="card__left">
          <h2 class="tc">{{ activeItem.name }}</h2>
          <img :src="activeItem.image" :alt="activeItem.name" width="64px" height="64px" class="m-2 float-left">
        </div>
        <div class="card__right">
          {{ activeItem.info }}
        </div>
		  </article>
    </div>
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
						image: "public/img/transport.svg",
						info: "Ano. V meziměstské dopravě po celé ČR je cestování možné jedině s rouškou."
					},
					{
						id: 2,
						name: "Kino",
						image: "public/img/cinema.svg",
						info: "Ano, pokud se v sále nachází více jak 100 návštěvníků."
					},
					{
						id: 3,
						name: "Lekarna",
						image: "public/img/hospital.svg",
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					},
					{
						id: 4,
						name: "Kadernictvi",
						image: "public/img/barber.svg",
						info: "Celorepublikově nemusí mít roušku kadeřník ani zákazník. Výjimka může nastat v lokálních ohniscích nákazy."
					},
					{
						id: 5,
						name: "Verejna doprava",
						image: "public/img/train.svg",
						info: "Roušku ve veřejné dopravě je nutné mít v městské hromadné dopravě, v prostorách metra, v meziměstských autobusech a vlacích, v taxislužbách. V Praze je nutné roušku nasadit i ve vnitřních prostorách nádraží. Cestující si mohou roušky sundat po dobu nezbytně nutnou pro konzumaci potravin a pokrmů včetně nápojů."
					},
          {
            id: 6,
            name: "Obchody",
            image: "public/img/shop.svg",
            info: "Celostátně tato povinnost neplatí. K tomuto opatření může být přistoupeno v lokálních ohniscích nákazy. Pro aktuální informace doporučujeme sledovat tuto stránku (https://koronavirus.mzcr.cz/aktualni-opatreni/) a webové stránky Krajské hygienické stanice daného regionu."
          },
          {
            id: 6,
            name: "Letiste",
            image: "public/img/airplane.svg",
            info: "Rouška je povinná uvnitř všech budov areálu Letiště Václava Havla."
          }
				]
			}
		}
	}
</script>