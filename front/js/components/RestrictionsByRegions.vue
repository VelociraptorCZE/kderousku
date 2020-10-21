<template>
	<section v-if="!restrictionList.isLoading">
		<div class="d-flex jcc aic p-4">
			<h2>Kraj</h2>

      <div>
        <label>
          <select @input="activeRegion = $event.target.value" class="m-3 select">
            <option :value="regionName" v-for="regionName in Object.keys(restrictionList)">
              {{ regionName }}
            </option>
          </select>
          <span class="focus"></span>
        </label>
      </div>
    </div>

		<article v-if="restrictionList[activeRegion]">
			<div v-if="!restrictionList[activeRegion].length">
				<h3 class="tc">V tomto kraji nevíme o žádném nařízení</h3>
			</div>

			<article class="container-regions p-4" v-for="restriction in restrictionList[activeRegion]" v-else>
				<div>
          <h3 class="mt-0 tc h3">Stredocesky</h3>
        </div>
        <div class="container-regions__cards">
          <div class="region-card--body">
            <div class="region-card--title">test</div>
            <div class="region-card--content">
              {{ restriction.info }}
            </div>
          </div>
        </div>
			</article>
		</article>
	</section>
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
