export const RESTRICTION_LIST = "api/v1/restriction-list";
export const RESTRICTION_LIST_BY_REGIONS = "api/v1/restriction-list-by-regions";

export default async (apiPoint, options) => {
	const response = await fetch(apiPoint, options);

	return response.json();
}