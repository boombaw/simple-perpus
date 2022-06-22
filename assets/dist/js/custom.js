function isLetter(str) {
	return /[a-zA-Z]/.test(str);
}

function isNumeric(str) {
	return /\d/.test(str);
}

function isSpecialChar(str) {
	return /[^a-zA-Z0-9]/.test(str);
}

function isEmptyOrSpaces(str) {
	return str === null || str.match(/^ *$/) !== null;
}

function filterKey(key) {
	var result = [];
	for (var i = 0; i < key.length; i++) {
		var c = key.charCodeAt(i);
		if (isLetter(c)) return true;
	}
	return result;
}
