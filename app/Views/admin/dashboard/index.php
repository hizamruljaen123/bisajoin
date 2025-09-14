<?= $this->extend('admin/template'); ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
    <div>
        <button class="btn btn-primary btn-sm" onclick="refreshData()">
            <i class="fas fa-sync-alt"></i> Refresh
        </button>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row">
    <div class="col-md-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number"><?= $wedding_stats['total'] ?></div>
                    <div>Pernikahan</div>
                </div>
                <i class="fas fa-heart fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number"><?= $engagement_stats['total'] ?></div>
                    <div>Tunangan</div>
                </div>
                <i class="fas fa-ring fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number"><?= $birthday_stats['total'] ?></div>
                    <div>Ulang Tahun</div>
                </div>
                <i class="fas fa-birthday-cake fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number"><?= $graduation_stats['total'] ?></div>
                    <div>Wisuda</div>
                </div>
                <i class="fas fa-graduation-cap fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Order Statistics</h5>
            </div>
            <div class="card-body">
                <canvas id="orderChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-money-bill-wave"></i> Payment Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <h3 class="text-primary"><?= $payment_stats['total'] ?></h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="col-4">
                        <h3 class="text-success"><?= $payment_stats['paid'] ?></h3>
                        <p>Paid</p>
                    </div>
                    <div class="col-4">
                        <h3 class="text-warning"><?= $payment_stats['verified'] ?></h3>
                        <p>Verified</p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <h4 class="text-success">Rp <?= number_format($total_revenue, 0, ',', '.') ?></h4>
                    <p>Total Revenue</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_orders as $order): ?>
                                <tr>
                                    <td>
                                        <a href="/admin/orders/<?= $order['code'] ?>" class="text-decoration-none">
                                            <?= $order['code'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            <?= ucfirst($order['type']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-status bg-<?= 
                                            $order['status'] === 'pending' ? 'warning' : 
                                            ($order['status'] === 'paid' ? 'info' : 'success')
                                        ?>">
                                            <?= ucfirst($order['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d M H:i', strtotime($order['created_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bell"></i> Recent Notifications</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_notifications as $notification): ?>
                                <tr>
                                    <td>
                                        <a href="/admin/orders/<?= $notification['order_code'] ?>" class="text-decoration-none">
                                            <?= $notification['order_code'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <small><?= substr($notification['message'], 0, 50) ?>...</small>
                                    </td>
                                    <td><?= date('d M H:i', strtotime($notification['sent_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Initialize Chart
const ctx = document.getElementById('orderChart').getContext('2d');
const orderChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Orders',
            data: [],
            borderColor: 'rgb(102, 126, 234)',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Load chart data
function loadChartData() {
    fetch('/admin/dashboard/chart-data')
        .then(response => response.json())
        .then(data => {
            orderChart.data.labels = data.dates;
            orderChart.data.datasets[0].data = data.counts;
            orderChart.update();
        });
}

// Refresh data
function refreshData() {
    loadChartData();
    location.reload();
}

// Load chart data on page load
loadChartData();
</script>
<?= $this->endSection() ?>