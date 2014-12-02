$(document).ready(function() {
	var indexs = $('.custom_index .slide');
	var currIndexNode = $('.custom_index .slide.active');
	var indexPageNodes = $('.index_list li');
	var intervalID = '';
	var animTime = 800;

	indexPageNodes.removeClass('active');
	$(indexPageNodes.get(currIndexNode.index())).addClass('active');

	var animTo = function (nextNode) {
		var tmpCurrNode = currIndexNode;

		tmpCurrNode.animate({
			opacity: 0,
		}, animTime, function() {
			tmpCurrNode.hide();
			tmpCurrNode.removeClass('active');
			nextNode.addClass('active');
		});

		nextNode.css({ display: "block", opacity: 0 }).animate({ opacity: 1 }, animTime);
		currIndexNode = nextNode;

		indexPageNodes.removeClass('active');
		$(indexPageNodes.get(currIndexNode.index())).addClass('active');
	};

	var initSlideBox = function () {
		clearInterval(intervalID);

		intervalID = setInterval(function(){
			var nextNode = currIndexNode.next('.slide');
			nextNode = nextNode.length == 0 ? $('.custom_index .slide').first() : nextNode;

			animTo(nextNode);
		}, 5000);
	};

	$('.index_list').delegate('li', 'click', function(event) {
		var index = $(this).index();
		
		animTo($(indexs.get(index)));
		initSlideBox();
	});

	initSlideBox();
});