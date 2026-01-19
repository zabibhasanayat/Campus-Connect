<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #0f172a;
        color: #f8fafc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: 260px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem 0;
        z-index: 1000;
        overflow-y: auto;
    }

    .sidebar-logo {
        padding: 0 1.5rem;
        margin-bottom: 2rem;
    }

    .sidebar-logo h3 {
        font-size: 1.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, #6366f1, #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .sidebar-logo p {
        font-size: 0.75rem;
        color: #64748b;
        margin-top: 0.25rem;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
    }

    .sidebar-menu li {
        margin-bottom: 0.5rem;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.875rem 1.5rem;
        color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s;
        position: relative;
    }

    .sidebar-link:hover {
        background: rgba(99, 102, 241, 0.1);
        color: #818cf8;
    }

    .sidebar-link.active {
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.2), transparent);
        color: #a5b4fc;
        border-left: 3px solid #6366f1;
    }

    .sidebar-link i {
        width: 24px;
        margin-right: 0.875rem;
        font-size: 1.25rem;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 1rem 1.5rem;
    }

    .sidebar-section-title {
        padding: 0 1.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin: 1.5rem 0 0.75rem;
    }

    /* Main Content */
    .main-content {
        margin-left: 260px;
        padding: 2rem;
        min-height: 100vh;
    }

    /* Dashboard Header */
    .dashboard-header {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(168, 85, 247, 0.9));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .welcome-text h1 {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.5rem;
    }

    .welcome-text p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1rem;
    }

    /* Quick Stats */
    .quick-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: rgba(99, 102, 241, 0.5);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #6366f1, #a855f7);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 900;
        color: white;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #94a3b8;
    }

    /* Resources Grid */
    .resources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .resource-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .resource-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(99, 102, 241, 0.4);
        border-color: rgba(99, 102, 241, 0.5);
    }

    .card-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 1.25rem;
    }

    .card-header h4 {
        font-size: 1.125rem;
        font-weight: 700;
        margin: 0;
    }

    .card-body {
        padding: 1.25rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #94a3b8;
        font-size: 0.875rem;
        margin-bottom: 0.75rem;
    }

    .info-item i {
        color: #6366f1;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-top: 0.75rem;
    }

    .badge-success {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-danger {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-book {
        display: block;
        width: 100%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 0.75rem;
        border-radius: 12px;
        font-weight: 700;
        text-align: center;
        text-decoration: none;
        margin-top: 1rem;
        transition: all 0.3s;
    }

    .btn-book:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        color: white;
    }

    .btn-disabled {
        background: #94a3b8;
        cursor: not-allowed;
        opacity: 0.7;
    }

    .btn-disabled:hover {
        transform: none;
        box-shadow: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .mobile-menu-btn {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: #6366f1;
            color: white;
            border: none;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
    }
</style>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <h3>Campus Connect</h3>
        <p>Student Portal</p>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="<?php echo URLROOT; ?>/student/index" class="sidebar-link active">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/student/my_bookings" class="sidebar-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>My Bookings</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/student/reports" class="sidebar-link">
                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                <span>Reports</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-divider"></div>

    <div class="sidebar-section-title">Quick Actions</div>

    <ul class="sidebar-menu">
        <li>
            <a href="#" class="sidebar-link">
                <i class="bi bi-search"></i>
                <span>Search Resources</span>
            </a>
        </li>
        <li>
            <a href="#" class="sidebar-link">
                <i class="bi bi-clock-history"></i>
                <span>History</span>
            </a>
        </li>
        <li>
            <a href="#" class="sidebar-link">
                <i class="bi bi-star-fill"></i>
                <span>Favorites</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-divider"></div>

    <div class="sidebar-section-title">Account</div>

    <ul class="sidebar-menu">
        <li>
            <a href="#" class="sidebar-link">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/users/logout" class="sidebar-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="welcome-text">
            <h1>Welcome back, <?php echo $_SESSION['user_name']; ?>! 👋</h1>
            <p>Discover and book campus resources for your academic needs.</p>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Total Bookings</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-value">3</div>
            <div class="stat-label">Pending Approval</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-value">8</div>
            <div class="stat-label">Approved</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="stat-value"><?php echo count($data['resources']); ?></div>
            <div class="stat-label">Available Resources</div>
        </div>
    </div>

    <!-- Resources Section -->
    <h2 style="margin-bottom: 1.5rem; font-size: 1.75rem; font-weight: 700;">
        <i class="bi bi-grid-3x3-gap-fill"></i> Available Resources
    </h2>

    <div class="resources-grid">
        <?php foreach($data['resources'] as $resource): ?>
            <div class="resource-card">
                <div class="card-header">
                    <h4><?php echo $resource->name; ?></h4>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span><?php echo $resource->location; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-people-fill"></i>
                        <span>Capacity: <?php echo $resource->capacity; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span><strong>Available: <?php echo $resource->available_capacity; ?></strong></span>
                    </div>
                    
                    <?php if ($resource->available_capacity > 0): ?>
                        <span class="badge badge-success">
                            <i class="bi bi-check-circle-fill"></i> Available (<?php echo $resource->available_capacity; ?> slots)
                        </span>
                        <a href="<?php echo URLROOT; ?>/student/book/<?php echo $resource->resource_id; ?>" class="btn-book">
                            <i class="bi bi-calendar-plus-fill"></i> Book Now
                        </a>
                    <?php else: ?>
                        <span class="badge badge-danger">
                            <i class="bi bi-x-circle-fill"></i> Fully Booked
                        </span>
                        <button class="btn-book btn-disabled" disabled>
                            <i class="bi bi-lock-fill"></i> Fully Booked
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
