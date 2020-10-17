import Vue from "vue";
import Restrictions from "./components/Restrictions.vue";
import RestrictionsByRegions from "./components/RestrictionsByRegions";

new Vue({
	el: "#main",
	render: r => r(Restrictions)
});

new Vue({
	el: "#regions",
	render: r => r(RestrictionsByRegions)
});
