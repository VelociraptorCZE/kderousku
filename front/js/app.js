import Vue from "vue";
import RestrictionCircles from "./components/RestrictionCircles.vue";

new Vue({
	el: "#circles",
	render: r => r(RestrictionCircles)
});