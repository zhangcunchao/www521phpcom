function onUploadStart(ev) {
	var progress = new FileProgress({id: ev.id}, "fsUploadProgress");
	progress.setStatus("Uploading...");
}

function onUploadCancel(ev) {
	var progress = new FileProgress({id: ev.id}, "fsUploadProgress");
	progress.setStatus("Cancelled.");
	progress.setComplete();
}

function onUploadComplete(ev) {
	var progress = new FileProgress({id: ev.id}, "fsUploadProgress");
	progress.setStatus("Complete.");
	progress.setComplete();
	top.location.href = top.location.href;
}

function onUploadError(ev) {
	var progress = new FileProgress({id: ev.id}, "fsUploadProgress");
	progress.setStatus("Error " + ev.status);
	progress.setComplete();
}