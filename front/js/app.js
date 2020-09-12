import Vue from "vue";
import RestrictionBadges from "./components/RestrictionBadges.vue";
import DynamicTabs from "./components/DynamicTabs";

DynamicTabs();

new Vue({
	el: "#circles",
	render: r => r(RestrictionBadges)
});