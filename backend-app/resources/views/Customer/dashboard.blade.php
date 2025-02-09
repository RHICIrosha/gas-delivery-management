<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - GasByGas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f7d44a;
            --secondary-color: #f8a427;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        .sidebar {
            background: #fff;
            min-height: calc(100vh - 56px);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .nav-link {
            color: #333;
            padding: 0.8rem 1rem;
        }

        .nav-link:hover {
            background-color: #fff3cd;
        }

        .nav-link.active {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        .btn-custom {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: #fff;
        }

        .btn-custom:hover {
            opacity: 0.9;
            color: #fff;
        }

        .table th {
            background-color: #fff3cd;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 3px 6px;
            border-radius: 50%;
            background-color: #dc3545;
            color: white;
            font-size: 0.7rem;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                GasByGas Customer Portal
            </a>
            <div class="d-flex align-items-center">
                <div class="position-relative me-4">
                    <i class="fas fa-bell text-white fa-lg"></i>
                    <span class="notification-badge">3</span>
                </div>
                <span class="text-white me-3">Welcome, John Smith</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-light btn-sm">Logout</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#request">
                            <i class="fas fa-shopping-cart me-2"></i>New Request
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tokens">
                            <i class="fas fa-ticket-alt me-2"></i>My Tokens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#history">
                            <i class="fas fa-history me-2"></i>Order History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#messages">
                            <i class="fas fa-envelope me-2"></i>Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">
                            <i class="fas fa-user me-2"></i>Profile
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <h4 class="mb-4">My Dashboard</h4>

                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Active Tokens</h5>
                                <h2 class="mb-0">2</h2>
                                <small>Valid until Feb 15, 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Last Order</h5>
                                <h2 class="mb-0">Jan 5</h2>
                                <small>12.5kg Cylinder</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Nearest Outlet</h5>
                                <h2 class="mb-0">2.5km</h2>
                                <small>Colombo Central</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Loyalty Points</h5>
                                <h2 class="mb-0">250</h2>
                                <small>Silver Member</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Tokens -->
                <div class="card mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Active Tokens</h5>
                        <button class="btn btn-custom btn-sm">Request New Token</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Token ID</th>
                                    <th>Outlet</th>
                                    <th>Request Date</th>
                                    <th>Valid Until</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TK0045</td>
                                    <td>Colombo Central</td>
                                    <td>2024-01-05</td>
                                    <td>2024-02-15</td>
                                    <td><span class="badge bg-success">Ready for Pickup</span></td>
                                    <td>
                                        <button class="btn btn-custom btn-sm">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>TK0046</td>
                                    <td>Colombo Central</td>
                                    <td>2024-01-10</td>
                                    <td>2024-02-20</td>
                                    <td><span class="badge bg-warning">Processing</span></td>
                                    <td>
                                        <button class="btn btn-custom btn-sm">View Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Messages -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Recent Messages</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Token Ready for Pickup</h6>
                                                <small class="text-muted">Your gas cylinder for token TK0045 is ready...</small>
                                            </div>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Payment Confirmation</h6>
                                                <small class="text-muted">Thank you for your payment of LKR 2,500...</small>
                                            </div>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nearest Outlets -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Nearest Outlets</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Colombo Central</h6>
                                                <small class="text-muted">2.5km away - Stock Available</small>
                                            </div>
                                            <span class="badge bg-success">Open</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">Nugegoda Branch</h6>
                                                <small class="text-muted">4.2km away - Limited Stock</small>
                                            </div>
                                            <span class="badge bg-success">Open</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
