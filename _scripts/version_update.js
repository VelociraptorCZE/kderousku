const { readFileSync, writeFileSync } = require("fs");

try {
	const envPath = `${__dirname}/../.env`;
	const contents = readFileSync(envPath, "utf8");
	const versionRegex = /APP_VERSION=\d+/;
	const [, version] = contents.match(versionRegex).toString().split("=");
	writeFileSync(envPath, contents.replace(versionRegex, `APP_VERSION=${parseInt(version) + 1}`));
} catch {
	console.log("Version update failed!");
}