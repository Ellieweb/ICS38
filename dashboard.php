<?php
session_start();
include('db.php');

// Security: Kick out guests
if (!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit(); 
}

// $current_user_id = $_SESSION['user_id'];

// /** * FEATURE: Toggle Category Filter [Requirement 2: Search/Sort]
//  * This replaces the manual text search with quick-click category buttons.
//  */
// $category_filter = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : "";
// $where_clause = "";

// if ($category_filter !== "") {
//     // Dynamically builds the WHERE clause based on the clicked button
//     $where_clause = " WHERE resources.category = '$category_filter' ";
// }

// /** * REQUIREMENT: SQL JOIN [Requirement 3: SQL Join Integration]
//  * Joins 'resources' with 'users' to display the author's name from a different table.
//  */
// $sql = "SELECT resources.*, users.fullname 
//         FROM resources 
//         INNER JOIN users ON resources.user_id = users.user_id 
//         $where_clause
//         ORDER BY created_at DESC";
// $resources = $conn->query($sql);

// /**
//  * REQUIREMENT: Statistics for Chart.js [Requirement 2: Charts]
//  */
// $chart_sql = "SELECT category, COUNT(*) as count FROM resources GROUP BY category";
// $chart_result = $conn->query($chart_sql);
// $categories = [];
// $counts = [];

// while($c_row = $chart_result->fetch_assoc()) {
//     $categories[] = $c_row['category'];
//     $counts[] = $c_row['count'];
// }
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="MyCSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard - Student Resource Hub</title>
    <style>
        /* Styling for the Toggle Buttons */
        .filter-btn {
            background: #6c757d;
            margin-right: 5px;
            padding: 8px 15px;
            font-size: 0.9rem;
        }
        .filter-btn.active {
            background: #002244; /* Darker blue for selected category */
            box-shadow: inset 0 3px 5px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <nav>
        <span><strong>Student Resource Hub</strong></span>
        <div>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h2>Campus Resource Feed</h2>
        
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
            <div>
                <a href="add_resource.php"><button style="background: #28a745;">+ Post New Resource</button></a>
            </div>

            <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                <span style="align-self: center; font-weight: bold; margin-right: 10px;">Filter:</span>
                
                <a href="dashboard.php">
                    <button class="filter-btn <?php echo $category_filter == '' ? 'active' : ''; ?>">All</button>
                </a>
                
                <a href="dashboard.php?category=Textbook">
                    <button class="filter-btn <?php echo $category_filter == 'Textbook' ? 'active' : ''; ?>">Textbooks</button>
                </a>
                
                <a href="dashboard.php?category=Computer Parts">
                    <button class="filter-btn <?php echo $category_filter == 'Computer Parts' ? 'active' : ''; ?>">Computer Parts</button>
                </a>
                
                <a href="dashboard.php?category=Notes">
                    <button class="filter-btn <?php echo $category_filter == 'Notes' ? 'active' : ''; ?>">Notes</button>
                </a>
                
                <a href="dashboard.php?category=Coloring Materials">
                    <button class="filter-btn <?php echo $category_filter == 'Coloring Materials' ? 'active' : ''; ?>">Coloring Materials</button>
                </a>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Posted By</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $resources->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <td>
                        <span class="status-tag <?php echo strtolower($row['status']); ?>">
                            <?php echo $row['status']; ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($row['user_id'] == $current_user_id): ?>
                            <a href="edit_resource.php?id=<?php echo $row['resource_id']; ?>">Edit</a> | 
                            <a href="delete_resource.php?id=<?php echo $row['resource_id']; ?>" 
                               style="color:red;" 
                               onclick="return confirm('Are you sure you want to delete this listing?')">Delete</a>
                        <?php else: ?>
                            <span style="color: #ccc;">No Access</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if($resources->num_rows == 0): ?>
                    <tr><td colspan="5" style="text-align:center;">No resources found in this category.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <hr style="margin: 40px 0; border: 0; border-top: 1px solid #eee;">
        
        <h2>Resource Statistics</h2>
        <div style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
            <canvas id="myChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($categories); ?>,
                datasets: [{
                    label: '# of Resources',
                    data: <?php echo json_encode($counts); ?>,
                    backgroundColor: '#003366',
                    borderColor: '#002244',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });
    </script>
</body>
</html> -->