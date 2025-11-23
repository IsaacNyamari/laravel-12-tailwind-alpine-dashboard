// Dashboard functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('dashboard', () => ({
        sidebarOpen: true,
        supportModalOpen: false,
        activeSupportTab: 'chat',
        openFAQ: null,
        chatMessage: '',

        openSupportModal() {
            this.supportModalOpen = true;
        },

        toggleFAQ(index) {
            this.openFAQ = this.openFAQ === index ? null : index;
        },

        sendChatMessage() {
            if (this.chatMessage.trim() === '') return;

            // In a real app, you would send this to a backend
            // For demo, we'll just log it
            console.log('Sending message:', this.chatMessage);

            // Clear the input
            this.chatMessage = '';
        }
    }));
});

// Initialize chart
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart')?.getContext('2d');
    if (ctx) {
        // Generate more realistic data
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const salesData = [12500, 14500, 11800, 16800, 19200, 21500, 23800, 22100, 24500, 26800, 25200, 28500];
        const revenueData = [10500, 12800, 9800, 14200, 16500, 18800, 20500, 19200, 21800, 23500, 22400, 24800];
        const customersData = [420, 480, 380, 520, 580, 640, 710, 680, 750, 820, 790, 860];

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Revenue',
                        data: revenueData,
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: 'rgb(34, 197, 94)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    },
                    {
                        label: 'Sales',
                        data: salesData,
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    },
                    {
                        label: 'Customers',
                        data: customersData,
                        borderColor: 'rgb(168, 85, 247)',
                        backgroundColor: 'rgba(168, 85, 247, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: 'rgb(168, 85, 247)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#fff',
                            font: {
                                size: 13,
                                weight: '600'
                            },
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.95)',
                        titleColor: '#94a3b8',
                        bodyColor: '#e2e8f0',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        padding: 12,
                        usePointStyle: true,
                        callbacks: {
                            label: function (context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    if (context.dataset.label === 'Customers') {
                                        label += context.parsed.y.toLocaleString();
                                    } else {
                                        label += '$' + context.parsed.y.toLocaleString();
                                    }
                                }
                                return label;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Monthly Performance Overview',
                        color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#fff',
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        padding: {
                            bottom: 20
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#94a3b8',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#94a3b8',
                            font: {
                                size: 11
                            },
                            callback: function (value) {
                                return '$' + value.toLocaleString();
                            }
                        },
                        title: {
                            display: true,
                            text: 'Revenue & Sales ($)',
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#94a3b8'
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                        ticks: {
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#94a3b8',
                            font: {
                                size: 11
                            },
                            callback: function (value) {
                                return value.toLocaleString();
                            }
                        },
                        title: {
                            display: true,
                            text: 'Customers',
                            color: getComputedStyle(document.body).getPropertyValue('--text-color') || '#94a3b8'
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                },
                elements: {
                    line: {
                        borderJoinStyle: 'round'
                    }
                }
            }
        });

        // Add theme-aware styling
        function updateChartColors() {
            const isDark = document.body.classList.contains('bg-slate-950');
            const textColor = isDark ? '#e2e8f0' : '#1e293b';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

            if (myChart) {
                myChart.options.plugins.legend.labels.color = textColor;
                myChart.options.plugins.title.color = textColor;
                myChart.options.scales.x.ticks.color = textColor;
                myChart.options.scales.y.ticks.color = textColor;
                myChart.options.scales.y1.ticks.color = textColor;
                myChart.options.scales.x.grid.color = gridColor;
                myChart.options.scales.y.grid.color = gridColor;
                myChart.update();
            }
        }

        // Update chart when theme changes
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    setTimeout(updateChartColors, 100);
                }
            });
        });
        observer.observe(document.body, { attributes: true });

        // Initial color update
        updateChartColors();
    }
});
