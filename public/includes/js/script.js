$(document).ready(function(){
	$('.info').hide();
})

// Wallet Balance Animation
window.onload = function () {

	var blue = 'transparent';
	var l = Snap('#logo');
	var p = l.select('path');

	l.append(p);

	p.attr({
		fill: blue,
		stroke: '#0066CC',
	});

	setTimeout( function() {
		// modify this one line below, and see the result !
		var currency = '<span>HOSTC</span>';
		var balance = 23.23000000;
		var balance = balance.toFixed(10);
		
		
		var logoTitle = balance;
		var logoRandom = '';
		var logoTitleContainer = l.text(0, '98%', '');
		var possible = "-+*/|}{[]~\\\":;?/.><=+-_)(*&^%$#@!)}";
		logoTitleContainer.attr({
			fontSize: 180,
			fontFamily: 'Dosis',
			fontWeight: '600'
		});

		function generateRandomTitle(i, logoRandom) {
			setTimeout( function() {
				logoTitleContainer.attr({ text: logoRandom });
			}, i*100 );
		}

		for( var i=0; i < logoTitle.length+1; i++ ) {
			logoRandom = logoTitle.substr(0, i);
			for( var j=i; j < logoTitle.length; j++ ) { 
				logoRandom += possible.charAt(Math.floor(Math.random() * possible.length)); 
			}
			generateRandomTitle(i, logoRandom);
			logoRandom = '';
		}

	}, 500 );

}

$('#sendBtn').click(function(){
	e.preventDefault;
})

// Hover Info
$('.copyInfo').hover(function(){
	$('.address').hide();
	$('.info:nth-child(2)').show();
	$(this).addClass('green');
}, function(){
	$('.info').hide();
	$('.address').show();
	$(this).removeClass('green');
})

$('.printInfo').hover(function(){
	$('.address').hide();
	$('.info:nth-child(3)').show();
	$(this).addClass('green');
}, function(){
	$('.info').hide();
	$('.address').show();
	$(this).removeClass('green');
})
$('.emailInfo').hover(function(){
	$('.address').hide();
	$('.info:nth-child(4)').show();
	$(this).addClass('green');
}, function(){
	$('.info').hide();
	$('.address').show();
	$(this).removeClass('green');
})
$('.blockInfo').hover(function(){
	$('.address').hide();
	$('.info:nth-child(5)').show();
	$(this).addClass('green');
}, function(){
	$('.info').hide();
	$('.address').show();
	$(this).removeClass('green');
})
