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

    /* Hero Search Section */
    .search-hero {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(139, 92, 246, 0.9));
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 3rem;
        margin-bottom: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .search-title {
        text-align: center;
        margin-bottom: 2rem;
    }

    .search-title h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: white;
        margin-bottom: 0.5rem;
    }

    .search-title p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.125rem;
    }

    /* Advanced Search Bar */
    .search-bar-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .search-bar {
        display: flex;
        gap: 1rem;
        background: white;
        padding: 1rem;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .search-input-wrapper {
        flex: 1;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid transparent;
        border-radius: 12px;
        font-size: 1rem;
        background: #f1f5f9;
        transition: all 0.3s;
    }

    .search-input:focus {
        outline: none;
        border-color: #6366f1;
        background: white;
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 1.25rem;
    }

    .search-btn {
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
    }

    /* Filter Section */
    .filter-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .filter-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .filter-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .filter-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .filter-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 600;
    }

    .filter-select {
        padding: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.05);
        color: white;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .filter-select:focus {
        outline: none;
        border-color: #6366f1;
        background: rgba(255, 255, 255, 0.1);
    }

    .filter-select option {
        background: #1e293b;
        color: white;
    }

    .filter-reset {
        padding: 0.75rem 1.5rem;
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }

    .filter-reset:hover {
        background: #ef4444;
        color: white;
    }

    /* Stats Bar */
    .stats-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .results-count {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .results-count strong {
        color: #6366f1;
        font-size: 1.5rem;
    }

    .sort-options {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .sort-btn {
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 0.875rem;
    }

    .sort-btn.active,
    .sort-btn:hover {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border-color: transparent;
    }

    /* Resource Grid */
    .resources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .resource-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
    }

    .resource-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(99, 102, 241, 0.3);
        border-color: rgba(99, 102, 241, 0.5);
    }

    .card-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        padding: 1.5rem;
        position: relative;
    }

    .card-header h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .card-header .resource-type {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .availability-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .available {
        background: rgba(16, 185, 129, 0.9);
        color: white;
    }

    .limited {
        background: rgba(245, 158, 11, 0.9);
        color: white;
    }

    .full {
        background: rgba(239, 68, 68, 0.9);
        color: white;
    }

    .card-body {
        padding: 1.5rem;
    }

    .resource-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-box {
        background: rgba(255, 255, 255, 0.05);
        padding: 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }

    .info-details {
        flex: 1;
    }

    .info-label {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.5);
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1rem;
        font-weight: 700;
        color: white;
    }

    .capacity-bar {
        margin-bottom: 1.5rem;
    }

    .capacity-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .capacity-progress {
        height: 8px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .capacity-fill {
        height: 100%;
        border-radius: 10px;
        transition: width 0.3s;
    }

    .capacity-available {
        background: linear-gradient(90deg, #10b981, #059669);
    }

    .capacity-limited {
        background: linear-gradient(90deg, #f59e0b, #d97706);
    }

    .capacity-full {
        background: linear-gradient(90deg, #ef4444, #dc2626);
    }

    .card-footer {
        padding: 1.5rem;
        background: rgba(0, 0, 0, 0.2);
        display: flex;
        gap: 0.75rem;
    }

    .btn-book {
        flex: 1;
        padding: 0.875rem;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-book:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        color: white;
    }

    .btn-book:disabled {
        background: #64748b;
        cursor: not-allowed;
        transform: none;
    }

    .btn-details {
        padding: 0.875rem 1.25rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-details:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .empty-state i {
        font-size: 5rem;
        color: rgba(255, 255, 255, 0.2);
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: white;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: rgba(255, 255, 255, 0.5);
    }

    /* Quick Stats */
    .quick-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-card-1 .stat-icon {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }

    .stat-card-2 .stat-icon {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .stat-card-3 .stat-icon {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .stat-info h4 {
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        margin: 0;
    }

    .stat-info p {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .search-title h1 {
            font-size: 1.75rem;
        }

        .search-bar {
            flex-direction: column;
        }

        .resources-grid {
            grid-template-columns: 1fr;
        }

        .filter-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container py-4">
    <!-- Hero Search Section -->
    <div class="search-hero">
        <div class="search-title">
            <h1>🔍 Search Campus Resources</h1>
            <p>Find and book labs, classrooms, and facilities instantly</p>
        </div>

        <div class="search-bar-container">
            <form method="GET" action="<?php echo URLROOT; ?>/student/search">
                <div class="search-bar">
                    <div class="search-input-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" 
                               name="q" 
                               class="search-input" 
                               placeholder="Search by resource name, location, or type..."
                               value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                    </div>
                    <button type="submit" class="search-btn">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
        <div class="stat-card stat-card-1">
            <div class="stat-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="stat-info">
                <h4><?php echo isset($data['resources']) ? count($data['resources']) : '0'; ?></h4>
                <p>Total Resources</p>
            </div>
        </div>

        <div class="stat-card stat-card-2">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h4><?php echo isset($data['available_count']) ? $data['available_count'] : '0'; ?></h4>
                <p>Available Now</p>
            </div>
        </div>

        <div class="stat-card stat-card-3">
            <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-info">
                <h4><?php echo isset($data['my_bookings']) ? $data['my_bookings'] : '0'; ?></h4>
                <p>My Bookings</p>
            </div>
        </div>
    </div>

    <!-- Advanced Filters -->
    <div class="filter-section">
        <div class="filter-header">
            <h3 class="filter-title">
                <i class="bi bi-funnel"></i>
                Advanced Filters
            </h3>
            <button class="filter-reset" onclick="resetFilters()">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
        </div>

        <form method="GET" action="<?php echo URLROOT; ?>/student/search" id="filterForm">
            <div class="filter-grid">
                <div class="filter-item">
                    <label class="filter-label">Resource Type</label>
                    <select name="type" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="">All Types</option>
                        <option value="Lab" <?php echo (isset($_GET['type']) && $_GET['type'] == 'Lab') ? 'selected' : ''; ?>>Lab</option>
                        <option value="Classroom" <?php echo (isset($_GET['type']) && $_GET['type'] == 'Classroom') ? 'selected' : ''; ?>>Classroom</option>
                        <option value="Hall" <?php echo (isset($_GET['type']) && $_GET['type'] == 'Hall') ? 'selected' : ''; ?>>Hall</option>
                        <option value="Library" <?php echo (isset($_GET['type']) && $_GET['type'] == 'Library') ? 'selected' : ''; ?>>Library</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Location</label>
                    <select name="location" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="">All Locations</option>
                        <option value="Building A" <?php echo (isset($_GET['location']) && $_GET['location'] == 'Building A') ? 'selected' : ''; ?>>Building A</option>
                        <option value="Building B" <?php echo (isset($_GET['location']) && $_GET['location'] == 'Building B') ? 'selected' : ''; ?>>Building B</option>
                        <option value="Building C" <?php echo (isset($_GET['location']) && $_GET['location'] == 'Building C') ? 'selected' : ''; ?>>Building C</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Min Capacity</label>
                    <select name="capacity" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="">Any Capacity</option>
                        <option value="10" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == '10') ? 'selected' : ''; ?>>10+ seats</option>
                        <option value="20" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == '20') ? 'selected' : ''; ?>>20+ seats</option>
                        <option value="50" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == '50') ? 'selected' : ''; ?>>50+ seats</option>
                        <option value="100" <?php echo (isset($_GET['capacity']) && $_GET['capacity'] == '100') ? 'selected' : ''; ?>>100+ seats</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Availability</label>
                    <select name="availability" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="">All Resources</option>
                        <option value="available" <?php echo (isset($_GET['availability']) && $_GET['availability'] == 'available') ? 'selected' : ''; ?>>Available Only</option>
                        <option value="limited" <?php echo (isset($_GET['availability']) && $_GET['availability'] == 'limited') ? 'selected' : ''; ?>>Limited Availability</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Results Stats Bar -->
    <div class="stats-bar">
        <div class="results-count">
            Showing <strong><?php echo isset($data['resources']) ? count($data['resources']) : '0'; ?></strong> resources
        </div>
        <div class="sort-options">
            <span style="color: rgba(255,255,255,0.6); font-size: 0.875rem;">Sort by:</span>
            <button class="sort-btn active" onclick="sortBy('name')">
                <i class="bi bi-sort-alpha-down"></i> Name
            </button>
            <button class="sort-btn" onclick="sortBy('capacity')">
                <i class="bi bi-people"></i> Capacity
            </button>
            <button class="sort-btn" onclick="sortBy('availability')">
                <i class="bi bi-check-circle"></i> Availability
            </button>
        </div>
    </div>

    <!-- Resources Grid -->
    <?php if(isset($data['resources']) && !empty($data['resources'])): ?>
        <div class="resources-grid">
            <?php foreach($data['resources'] as $resource): ?>
                <?php 
                    $availablePercent = ($resource->available_capacity / $resource->capacity) * 100;
                    $availabilityClass = $availablePercent > 50 ? 'available' : ($availablePercent > 0 ? 'limited' : 'full');
                    $availabilityText = $availablePercent > 50 ? 'Available' : ($availablePercent > 0 ? 'Limited' : 'Full');
                ?>
                <div class="resource-card">
                    <div class="card-header">
                        <div class="availability-badge <?php echo $availabilityClass; ?>">
                            <i class="bi bi-circle-fill"></i>
                            <?php echo $availabilityText; ?>
                        </div>
                        <h3><?php echo $resource->name; ?></h3>
                        <div class="resource-type">
                            <i class="bi bi-tag"></i>
                            <?php echo $resource->type; ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="resource-info-grid">
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="info-details">
                                    <div class="info-label">Location</div>
                                    <div class="info-value"><?php echo $resource->location; ?></div>
                                </div>
                            </div>

                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="info-details">
                                    <div class="info-label">Capacity</div>
                                    <div class="info-value"><?php echo $resource->capacity; ?> seats</div>
                                </div>
                            </div>
                        </div>

                        <div class="capacity-bar">
                            <div class="capacity-label">
                                <span style="color: rgba(255,255,255,0.7);">Availability</span>
                                <span style="color: white; font-weight: 700;">
                                    <?php echo $resource->available_capacity; ?> / <?php echo $resource->capacity; ?>
                                </span>
                            </div>
                            <div class="capacity-progress">
                                <div class="capacity-fill capacity-<?php echo $availabilityClass; ?>" 
                                     style="width: <?php echo $availablePercent; ?>%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?php if($resource->available_capacity > 0): ?>
                            <a href="<?php echo URLROOT; ?>/student/book/<?php echo $resource->resource_id; ?>" class="btn-book">
                                <i class="bi bi-calendar-plus"></i>
                                Book Now
                            </a>
                        <?php else: ?>
                            <button class="btn-book" disabled>
                                <i class="bi bi-lock"></i>
                                Fully Booked
                            </button>
                        <?php endif; ?>
                        <button class="btn-details" onclick="viewDetails(<?php echo $resource->resource_id; ?>)">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h3>No Resources Found</h3>
            <p>Try adjusting your search or filters to find what you're looking for.</p>
        </div>
    <?php endif; ?>
</div>

<script>
    function resetFilters() {
        window.location.href = '<?php echo URLROOT; ?>/student/search';
    }

    function sortBy(criteria) {
        // Update active button
        document.querySelectorAll('.sort-btn').forEach(btn => btn.classList.remove('active'));
        event.target.closest('.sort-btn').classList.add('active');
        
        // Add sort parameter to URL
        const url = new URL(window.location.href);
        url.searchParams.set('sort', criteria);
        window.location.href = url.toString();
    }

    function viewDetails(resourceId) {
        window.location.href = '<?php echo URLROOT; ?>/student/resource/' + resourceId;
    }
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
