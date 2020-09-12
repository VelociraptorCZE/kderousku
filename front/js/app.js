import Vue from "vue";
import RestrictionCircles from "./components/RestrictionCircles.vue";
import DynamicTabs from "./components/DynamicTabs";

DynamicTabs();

new Vue({
	el: "#circles",
	render: r => r(RestrictionCircles)
});