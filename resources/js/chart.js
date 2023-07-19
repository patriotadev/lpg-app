import Chart from 'chart.js/auto';

const pieChart = document.getElementById('pie-chart');

if (pieChart) {
    let ctx = document.getElementById('pie-chart').getContext('2d');
    new Chart(ctx, config);
}
