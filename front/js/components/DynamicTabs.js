const TAB_TRIGGER_ATTRIBUTE = "[data-tab-trigger]";

const makeInactive = element => element?.classList.remove("active");

const makeActive = element => element?.classList.add("active");

const registerTriggerEvents = (containers, tab) => {
	const triggers = [...tab.querySelectorAll(TAB_TRIGGER_ATTRIBUTE)];
	const getActiveTabTrigger = () => tab.querySelector(`${TAB_TRIGGER_ATTRIBUTE}.active`);
	const getActiveContainer = () => containers?.querySelector("[data-tab-container].active");
	const getContainer = tabName => containers?.querySelector(`[data-tab-container="${tabName}"]`);

	triggers.forEach(trigger => {
		trigger.addEventListener("click", () => {
			makeInactive(getActiveContainer());
			makeInactive(getActiveTabTrigger());

			makeActive(getContainer(trigger.dataset.tabTrigger));
			makeActive(trigger);
		});
	});
};

export default () => {
	const tabs = [...document.getElementsByClassName("dynamic-tabs")];

	tabs.forEach(tab => {
		const containers = document.getElementById(tab.dataset.tabId);

		registerTriggerEvents(containers, tab);
	});
};