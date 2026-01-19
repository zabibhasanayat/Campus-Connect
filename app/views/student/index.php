<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        color: #f8fafc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Sidebar */
    .student-sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: 280px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem 0;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 5px 0 30px rgba(0, 0, 0, 0.5);
    }

    .sidebar-brand {
        padding: 0 1.5rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .sidebar-brand h2 {
        font-size: 1.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sidebar-brand p {
        font-size: 0.75rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
    }

    .nav-item {
        margin-bottom: 0.25rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 600;
    }

    .nav-link:hover {
        background: rgba(99, 102, 241, 0.1);
        color: #6366f1;
    }

    .nav-link.active {
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.2), transparent);
        color: #6366f1;
        border-left: 4px solid #6366f1;
    }

    .nav-link i {
        width: 28px;
        margin-right: 1rem;
        font-size: 1.25rem;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 1.5rem 1.5rem;
    }

    /* Main Content */
    .main-content {
        margin-left: 280px;
        padding: 2rem;
        min-height: 100vh;
    }

    /* Welcome Section */
    .welcome-section {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(168, 85, 247, 0.9));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .welcome-content h1 {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.5rem;
    }

    .welcome-content p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    /* Statistics Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-card-1 .stat-icon {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
    }

    .stat-card-2 .stat-icon {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
    }

    .stat-card-3 .stat-icon {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .stat-card-4 .stat-icon {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .stat-info h3 {
        color: white;
        font-size: 1.75rem;
        font-weight: 800;
        margin: 0;
    }

    .stat-info p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-weight: 500;
        font-size: 0.875rem;
    }

    /* Section Header */
    .section-header {
        margin-bottom: 2rem;
    }

    .section-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* Resources Grid */
    .resources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    /* Resource Card */
    .resource-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
    }

    .resource-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(99, 102, 241, 0.4);
    }

    .card-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 1.5rem;
    }

    .card-header h4 {
        font-size: 1.125rem;
        font-weight: 700;
        margin: 0;
    }

    .card-body {
        padding: 1.5rem;
        flex: 1;
    }

    .resource-info {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #334155;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .info-item i {
        font-size: 1.125rem;
    }

    .icon-location { color: #6366f1; }
    .icon-type { color: #10b981; }
    .icon-capacity { color: #3b82f6; }
    .icon-available { color: #f59e0b; }

    .card-footer {
        padding: 1rem 1.5rem;
        background: rgba(0, 0, 0, 0.02);
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Badge */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .badge-success {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-danger {
        background: #fee2e2;
        color: #dc2626;
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        width: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        color: white;
    }

    .btn-disabled {
        background: #94a3b8;
        color: white;
        width: 100%;
        cursor: not-allowed;
        opacity: 0.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .student-sidebar {
            transform: translateX(-100%);
        }

        .main-content {
            margin-left: 0;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .resources-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Sidebar -->
<aside class="student-sidebar">
    <div class="sidebar-brand">
        <h2>📚 Campus Connect</h2>
        <p>Student Portal</p>
    </div>

    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/student/index" class="nav-link active">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/student/search" class="nav-link">
                <i class="bi bi-search"></i>
                <span>Search Resources</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/student/my_bookings" class="nav-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>My Bookings</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/student/reports" class="nav-link">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Reports</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-divider"></div>

    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="welcome-content">
            <h1>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Student'; ?>! 👋</h1>
            <p>Discover and book campus resources for your academic needs.</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-card-1">
            <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo isset($data['total_bookings']) ? $data['total_bookings'] : '0'; ?></h3>
                <p>Total Bookings</p>
            </div>
        </div>

        <div class="stat-card stat-card-2">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo isset($data['pending_bookings']) ? $data['pending_bookings'] : '0'; ?></h3>
                <p>Pending Approval</p>
            </div>
        </div>

        <div class="stat-card stat-card-3">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo isset($data['approved_bookings']) ? $data['approved_bookings'] : '0'; ?></h3>
                <p>Approved</p>
            </div>
        </div>

        <div class="stat-card stat-card-4">
            <div class="stat-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="stat-info">
                <h3><?php echo isset($data['available_resources']) ? $data['available_resources'] : '0'; ?></h3>
                <p>Available Resources</p>
            </div>
        </div>
    </div>

    <!-- Available Resources Section -->
    <div class="section-header">
        <h2><i class="bi bi-grid-3x3-gap-fill"></i> Available Resources</h2>
    </div>

    <div class="resources-grid">
        <?php if(isset($data['resources']) && !empty($data['resources'])): ?>
            <?php foreach($data['resources'] as $resource): ?>
                <div class="resource-card">
                    <div class="card-header">
                        <h4><?php echo $resource->name; ?></h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="resource-info">
                            <div class="info-item">
                                <i class="bi bi-geo-alt-fill icon-location"></i>
                                <span><?php echo $resource->location; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-tag-fill icon-type"></i>
                                <span><?php echo $resource->type; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-people-fill icon-capacity"></i>
                                <span>Capacity: <?php echo $resource->capacity; ?></span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-check-circle-fill icon-available"></i>
                                <span><strong>Available: <?php echo $resource->available_capacity; ?></strong></span>
                            </div>
                        </div>

                        <?php if($resource->available_capacity > 0): ?>
                            <span class="badge badge-success">
                                <i class="bi bi-check-circle-fill"></i> 
                                Available
                            </span>
                        <?php else: ?>
                            <span class="badge badge-danger">
                                <i class="bi bi-x-circle-fill"></i> 
                                Fully Booked
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer">
                        <?php if($resource->available_capacity > 0): ?>
                            <a href="<?php echo URLROOT; ?>/student/book/<?php echo $resource->resource_id; ?>" class="btn btn-primary">
                                <i class="bi bi-calendar-plus-fill"></i> 
                                Book Now
                            </a>
                        <?php else: ?>
                            <button class="btn btn-disabled" disabled>
                                <i class="bi bi-lock-fill"></i> 
                                Fully Booked
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 3rem; color: rgba(255,255,255,0.5); grid-column: 1/-1;">
                <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                <p style="margin-top: 1rem;">No resources available.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
