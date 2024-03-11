import Line from 'chart.js/auto';

Alpine.data('line', (element, data) => ({
    line: null,
    init() {
        const el = document.getElementById(element).getContext('2d');
        this.line = new Line(el, {
            type: 'line',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Steps per Day',
                    data: Object.values(data),
                    fill: true,
                    borderColor: '#3bdf85',
                    tension: 0.5
                }],
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Steps'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    }
                }
            },
        });
    },
}));
