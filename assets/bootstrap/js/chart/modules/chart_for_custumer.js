var chart3 = AmCharts.makeChart("chart_custumer", {
		  "type": "serial",
		  "theme": "light",
		  
		  "marginRight": 70,
		  "dataProvider": custumer,
		  "valueAxes": [{
		    "axisAlpha": 0,
		    "position": "left",
		  }],
		  "startDuration": 1,
		  "graphs": [{
		    "balloonText": "<b>[[category]]: [[value]]</b>",
		    "fillColorsField": "color",
		    "fillAlphas": 0.9,
		    "lineAlpha": 0.2,
		    "type": "column",
		    "valueField": "ca",

		  }],
		  "chartCursor": {
		    "categoryBalloonEnabled": false,
		    "cursorAlpha": 0,
		    "zoomable": false
		  },
		  "categoryField": "custumer",
		  "categoryAxis": {
		    "gridPosition": "start",
		    "labelRotation": 45,
		  },
		  "export": {
		    "enabled": true,
		  }
		});
		