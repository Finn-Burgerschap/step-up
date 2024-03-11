import Chart from 'chart.js/auto';

Alpine.data('pie', (element, percentage) => ({
    pie: null,
    init() {
        const el = document.getElementById(element).getContext('2d');
        this.pie = new Chart(el, {
            type: 'doughnut',
            data: {
                labels: ['test'],
                datasets: [
                    {
                        data: [percentage, 100 - percentage],
                        backgroundColor: ['#3bff85', '#f1f1f1'],
                        cutout: '70%',
                        borderWidth: 0,
                    },
                ],
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
            },
        });
    },
}));
