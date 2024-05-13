const lineOptions = (backgroundColor, borderColor, data) => ({
    type: 'line',
    data: {
        labels: Array.from({ length: data.length }, (_, i) => i + 1),
        datasets: [
            {
                backgroundColor,
                borderColor,
                data,
                tension: 0.4,
                pointRadius: (ctx) => {
                    const points = [];
                    const length = ctx.chart.data.labels.length - 1;
                    for (let i = 0; i <= length; i++) {
                        if (i === 0 || i === length)
                            points.push(3);
                        else
                            points.push(0);
                    }
                    return points;
                },
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
            x: {
                display: false,
            },
            y: {
                display: false,
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            title: {
                display: false,
            },
            tooltip: {
                enabled: false,
            },
        },
    },
});
export default function HomeChart() {
    if (typeof globals !== 'undefined') {
        const { Home: { Chart: { mini: { income, products, orders, visitors }, }, }, } = globals;
        const chartIncomeCTX = document.getElementById('chart_income');
        const chartIncome = new Chart(chartIncomeCTX, lineOptions(income.backgroundColor, income.borderColor, income.data));
        const chartProductsCTX = document.getElementById('chart_products');
        const chartProducts = new Chart(chartProductsCTX, lineOptions(products.backgroundColor, products.borderColor, products.data));
        const chartOrdersCTX = document.getElementById('chart_orders');
        const chartOrders = new Chart(chartOrdersCTX, lineOptions(orders.backgroundColor, orders.borderColor, orders.data));
        const chartVisitorsCTX = document.getElementById('chart_visitors');
        const chartVisitors = new Chart(chartVisitorsCTX, lineOptions(visitors.backgroundColor, visitors.borderColor, visitors.data));
        window.addEventListener('resize', () => {
            chartIncome.resize();
            chartProducts.resize();
            chartOrders.resize();
            chartVisitors.resize();
        });
    }
}
