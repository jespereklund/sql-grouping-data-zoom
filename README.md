# sql-grouping-data-zoom

This is a demonstration of an idea, to make a backend, that handles requests for a time-value chart, that always returns the same number of data rows, no matter the time period in the data.

This is done with some simple calculations and a GROUP BY clause in the SQL statement. 

To calculate and use a numeric zoom factor, a unix timestamp is kept along the date in each row.

The demo dataset contains 32227 BTC prices and values.

The graph is using [link Chart.js](https://www.chartjs.org) and contains both the aggregated price and the aggregated volume.

There is a custom zoom level bar to show the selected period in the dataset.

The resulting SQL statement is send back to the client at can be monitored as the zoom level changes.

To use the chart, use the mouse to point where to zoom and use the mouse wheel to zoom in and out.

Open [SQL Grouping Data Zoom](https://flettedehvaler.dk/smart_data_zoom)
