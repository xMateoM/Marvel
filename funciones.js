function like(id) {
	var like = document.getElementById('like' + id).childNodes[0].data;
	like = parseInt(like)+1;
	document.getElementById('like' + id).childNodes[0].data = like;
}

function dislike(id) {
	var dislike = document.getElementById('dislike' + id).childNodes[0].data;
	dislike = parseInt(dislike)+1;
	document.getElementById('dislike' + id).childNodes[0].data = dislike;
}