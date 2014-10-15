$(function () {

	if (!$('#area-chart').length) { return false; }
	
	area ();	

	$(window).resize (target_admin.debounce (area, 250));

});

function area () {
	$('#area-chart').empty ();

	Morris.Area ({
		element: 'area-chart',
		data: [
			{period: '2010 Q1', Agrovets: 2666, Players: null, ACILD: 2647},
			{period: '2010 Q2', Agrovets: 2778, Players: 2294, ACILD: 2441},
			{period: '2010 Q3', Agrovets: 4912, Players: 1969, ACILD: 2501},
			{period: '2010 Q4', Agrovets: 3767, Players: 3597, ACILD: 5689},
			{period: '2011 Q1', Agrovets: 6810, Players: 1914, ACILD: 2293},
			{period: '2011 Q2', Agrovets: 5670, Players: 4293, ACILD: 1881},
			{period: '2011 Q3', Agrovets: 4820, Players: 3795, ACILD: 1588},
			{period: '2011 Q4', Agrovets: 15073, Players: 5967, ACILD: 5175},
			{period: '2012 Q1', Agrovets: 10687, Players: 4460, ACILD: 2028},
			{period: '2012 Q2', Agrovets: 8432, Players: 5713, ACILD: 1791}
		],
		xkey: 'period',
		ykeys: ['Agrovets', 'Players', 'ACILD'],
		labels: ['Agrovets', 'Players', 'ACILD'],
		pointSize: 3,
		hideHover: 'auto',
		lineColors: target_admin.layoutColors
	});
}