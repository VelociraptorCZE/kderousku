<template>
	<div v-if="!restrictionList.isLoading">
		<div class="d-flex jcc p-4">
			<h2>Kraj</h2>

			<select @input="activeRegion = $event.target.value" class="m-3">
				<option :value="regionName" v-for="regionName in Object.keys(restrictionList)">
					{{ regionName }}
				</option>
			</select>
		</div>

		<div v-if="restrictionList[activeRegion]">
			<div v-if="!restrictionList[activeRegion].length">
				<h3 class="tc">V tomto kraji nevíme o žádném nařízení</h3>
			</div>

			<div class="restriction-card p-4" v-for="restriction in restrictionList[activeRegion]" v-else>
				<div>
					<h3 class="mt-0">{{ restriction.name }}</h3>

					{{ restriction.info }}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import regeneratorRuntime from "regenerator-runtime";
import fetchDataFromApi, { RESTRICTION_LIST_BY_REGIONS } from "../utils/fetchDataFromApi";

export default {
	data () {
		return {
			restrictionList: {
				isLoading: true
			},
			activeRegion: null
		};
	},

	async beforeMount () {
		this.restrictionList = await fetchDataFromApi(RESTRICTION_LIST_BY_REGIONS);
		this.activeRegion = Object.keys(this.restrictionList)[0];
	}
}
</script>
