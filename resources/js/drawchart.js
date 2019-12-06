$(function () {

    google.charts.load('current', {'packages': ['corechart'], 'language': 'fr'});
    google.charts.setOnLoadCallback(callChart);

    function drawChart(id) {
        let url = base_url + '/api/datachart/' + id;

        axios.get(url).then((response) => {
            let datatab = response.data;

            datatab.forEach(dot => {
                dot[0] = new Date(dot[0]);
            });
            datatab.unshift(['date', 'euro']);

            let data = new google.visualization.arrayToDataTable(datatab);
            let options = {
                curveType: 'function',
                height: 450,
                vAxis: {minValue: 0}
            };
            let chart = new google.visualization.LineChart(document.getElementById('chart-box'));

            chart.draw(data, options);
        });
    }

    function callChart() {
        let select_input = $('#coinslist');

        drawChart(select_input.val());
        select_input.change(function () {
            drawChart($(this).val())
        });

        $(window).resize(function() {
            drawChart(select_input.val());
        });
    }
});
