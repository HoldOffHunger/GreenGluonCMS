function clearselection() {
	if(document.selection && document.selection.empty) {
		document.selection.empty();
	} else if(window.getSelection) {
		window.getSelection().removeAllRanges();
	}
}