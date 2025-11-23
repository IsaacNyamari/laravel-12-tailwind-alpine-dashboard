// Fallback Utils if Chart.js sample Utils isn't available
const Utils = window.Utils || {
    months: ({ count = 7 } = {}) => {
        const m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return Array.from({ length: count }, (_, i) => m[i % 12]);
    },
    numbers: ({ count = 7, min = 0, max = 100 } = {}) => {
        const range = max - min;
        return Array.from({ length: count }, () => Math.floor(Math.random() * range) + min);
    },
    CHART_COLORS: {
        blue: 'rgb(54, 162, 235)',
        green: 'rgb(75, 192, 192)',
        red: 'rgb(255, 99, 132)'
    }
};

const DATA_COUNT = 7;
const NUMBER_CFG = { count: DATA_COUNT, min: -100, max: 100 };

const labels = Utils.months({ count: DATA_COUNT });
const data = {
    labels: labels,
    datasets: [
        {
            label: 'Unfilled',
            fill: false,
            backgroundColor: Utils.CHART_COLORS.blue,
            borderColor: Utils.CHART_COLORS.blue,
            data: Utils.numbers(NUMBER_CFG),
        },
        {
            label: 'Dashed',
            fill: false,
            backgroundColor: Utils.CHART_COLORS.green,
            borderColor: Utils.CHART_COLORS.green,
            borderDash: [5, 5],
            data: Utils.numbers(NUMBER_CFG),
        },
        {
            label: 'Filled',
            backgroundColor: Utils.CHART_COLORS.red,
            borderColor: Utils.CHART_COLORS.red,
            data: Utils.numbers(NUMBER_CFG),
            fill: true,
        }
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Chart.js Line Chart'
            }
        },
        interaction: {
            mode: 'index',
            intersect: false
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: 'Value'
                }
            }
        }
    },
};

// Allow the chart to size to its container
if (window.Chart) {
    Chart.defaults.responsive = true;
    Chart.defaults.maintainAspectRatio = false;
}

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, config);