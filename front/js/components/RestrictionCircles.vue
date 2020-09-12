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
			<h2 class="font-heading">{{ activeItem.name }}</h2>

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
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					},
					{
						id: 2,
						name: "MHD",
						image: "public/img/mhd.svg",
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					},
					{
						id: 3,
						name: "MHD",
						image: "public/img/mhd.svg",
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					},
					{
						id: 4,
						name: "MHD",
						image: "public/img/mhd.svg",
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					},
					{
						id: 5,
						name: "MHD",
						image: "public/img/mhd.svg",
						info: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
					}
				]
			}
		}
	}
</script>