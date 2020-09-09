<template>
	<section class="restriction-circles">
		<div class="restriction-circles__item" v-for="circle in circles">
			<img :src="circle.image" :alt="circle.name" class="m-4">

			{{ circle.name }}
		</div>
	</section>
</template>

<script>
	export default {
		data () {
			return {
				circles: [
					{
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						name: "MHD",
						image: "public/img/mhd.svg"
					},
					{
						name: "MHD",
						image: "public/img/mhd.svg"
					}
				]
			}
		}
	}
</script>