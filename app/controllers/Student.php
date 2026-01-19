<?php
class Student extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'Student') {
            header('location: ' . URLROOT . '/auth/login');
            exit();
        }
        
        $this->resourceModel = $this->model('ResourceModel');
        $this->bookingModel = $this->model('BookingModel'); 
    }


    public function index() {
    $userId = $_SESSION['user_id'];
    
    // Get all resources
    $resources = $this->resourceModel->getResources();
    
    // Get user's booking statistics
    $stats = $this->bookingModel->getUserBookingStats($userId);
    
    // Count available resources
    $availableCount = 0;
    if($resources) {
        foreach($resources as $resource) {
            if($resource->available_capacity > 0) {
                $availableCount++;
            }
        }
    }
    
    $data = [
        'resources' => $resources,
        'total_bookings' => $stats->total ?? 0,
        'pending_bookings' => $stats->pending ?? 0,
        'approved_bookings' => $stats->approved ?? 0,
        'available_resources' => $availableCount
    ];
    
    $this->view('student/index', $data);
}


    // NEW: Advanced Search Page
    public function search() {
        // Get search parameters from URL
        $searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $capacity = isset($_GET['capacity']) ? intval($_GET['capacity']) : 0;
        $availability = isset($_GET['availability']) ? $_GET['availability'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';

        // Get filtered resources
        $resources = $this->resourceModel->searchResources($searchQuery, $type, $location, $capacity, $availability, $sort);

        // Count available resources
        $availableCount = 0;
        if($resources) {
            foreach($resources as $resource) {
                if($resource->available_capacity > 0) {
                    $availableCount++;
                }
            }
        }

        // Get user's total booking count
        $myBookingsCount = $this->bookingModel->getUserBookingCount($_SESSION['user_id']);

        $data = [
            'resources' => $resources,
            'available_count' => $availableCount,
            'my_bookings' => $myBookingsCount
        ];

        $this->view('student/search', $data);
    }


    public function book($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if resource has available capacity
            if (!$this->resourceModel->hasAvailableCapacity($id)) {
                die('Sorry, this resource is fully booked. No available capacity.');
            }
            
            $data = [
                'user_id' => $_SESSION['user_id'],
                'resource_id' => $id,
                'date' => trim($_POST['date']),
                'start_time' => trim($_POST['start_time']),
                'end_time' => trim($_POST['end_time']),
                'purpose' => trim($_POST['purpose'])
            ];
            
            if ($this->bookingModel->createBooking($data)) {
                header('location: ' . URLROOT . '/student/my_bookings');
                exit();
            } else {
                die('Something went wrong during booking.');
            }
        } else {
            $resource = $this->resourceModel->getResourceById($id);
            
            if(!$resource) {
                header('location: ' . URLROOT . '/student/index');
                exit();
            }
            
            $data = ['resource' => $resource];
            $this->view('student/book', $data);
        }
    }


    public function my_bookings() {
        $bookings = $this->bookingModel->getUserBookings($_SESSION['user_id']);
        $data = ['bookings' => $bookings];
        $this->view('student/my_bookings', $data);
    }


    public function reports() {
        // Get filter from URL
        $status = isset($_GET['status']) ? $_GET['status'] : null;
        
        // Get filtered bookings
        $bookings = $this->bookingModel->getUserBookingsByStatus($_SESSION['user_id'], $status);
        
        // Get statistics
        $stats = $this->bookingModel->getUserBookingStats($_SESSION['user_id']);
        
        $data = [
            'bookings' => $bookings,
            'stats' => $stats,
            'current_filter' => $status
        ];
        
        $this->view('student/reports', $data);
    }
}
