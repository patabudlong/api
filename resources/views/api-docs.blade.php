<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* Modern Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 280px;
            background: white;
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
            padding: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.02);
        }

        .sidebar-header {
            padding: 20px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .search-box {
            position: relative;
            margin-bottom: 10px;
        }

        .search-box input {
            width: 100%;
            padding: 8px 15px;
            padding-left: 35px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            font-size: 14px;
            background: white;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .nav-section {
            padding: 15px 0;
        }

        .nav-section-title {
            padding: 8px 20px;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .nav-item {
            padding: 8px 20px;
            display: flex;
            align-items: center;
            color: #475569;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: #f8fafc;
            color: #2563eb;
        }

        .nav-item.active {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 500;
        }

        .method-label {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            margin-right: 8px;
            color: white;
            text-transform: uppercase;
        }

        .method-get { background: #22c55e; }
        .method-post { background: #3b82f6; }
        .method-put { background: #f59e0b; }
        .method-delete { background: #ef4444; }

        .nav-sub-item {
            padding: 8px 20px 8px 40px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            display: block;
            transition: all 0.2s;
        }

        .nav-sub-item:hover {
            background: #f8fafc;
            color: #2563eb;
        }

        /* Keep existing styles for main content */
        .main-content {
            margin-left: 280px;
            padding: 40px;
        }

        /* Keep existing endpoint styles */
        .endpoint {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .method {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            font-size: 14px;
            margin-right: 10px;
        }

        .get { background-color: #28a745; }
        .post { background-color: #007bff; }
        .put { background-color: #ffc107; }
        .delete { background-color: #dc3545; }

        .endpoint-url {
            font-family: monospace;
            font-size: 14px;
            color: #666;
        }

        pre {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }

        .nav-link {
            color: #333;
            padding: 8px 15px;
            border-radius: 4px;
        }

        .nav-link:hover {
            background: #f8f9fa;
        }

        h2 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .parameter-table {
            width: 100%;
            margin: 20px 0;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }

        .parameter-table th,
        .parameter-table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        .parameter-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h5 class="mb-3">Task API Documentation</h5>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search endpoints..." />
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Authentication</div>
            <a href="#register" class="nav-item">
                <span class="method-label method-post">post</span>
                Register
            </a>
            <a href="#login" class="nav-item">
                <span class="method-label method-post">post</span>
                Login
            </a>
            <a href="#logout" class="nav-item">
                <span class="method-label method-post">post</span>
                Logout
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Tasks</div>
            <a href="#list-tasks" class="nav-item">
                <span class="method-label method-get">get</span>
                List Tasks
            </a>
            <a href="#create-task" class="nav-item">
                <span class="method-label method-post">post</span>
                Create Task
            </a>
            <a href="#get-task" class="nav-item">
                <span class="method-label method-get">get</span>
                Get Task
            </a>
            <a href="#update-task" class="nav-item">
                <span class="method-label method-put">put</span>
                Update Task
            </a>
            <a href="#delete-task" class="nav-item">
                <span class="method-label method-delete">del</span>
                Delete Task
            </a>
        </div>
    </div>

    <div class="main-content">
        <h2 id="authentication">Authentication</h2>

        <div id="register" class="endpoint">
            <span class="method post">POST</span>
            <span class="endpoint-url">/api/register</span>

            <h4 class="mt-3">Register a new user</h4>
            <p>Create a new user account and receive an authentication token.</p>

            <h5>Request Body</h5>
            <table class="parameter-table">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Required</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>name</td>
                        <td>string</td>
                        <td>User's full name</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>string</td>
                        <td>User's email address</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td>string</td>
                        <td>User's password (min. 8 characters)</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>password_confirmation</td>
                        <td>string</td>
                        <td>Password confirmation</td>
                        <td>Yes</td>
                    </tr>
                </tbody>
            </table>

            <h5>Response (201 Created)</h5>
            <pre><code>{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2024-01-01T12:00:00.000000Z",
        "updated_at": "2024-01-01T12:00:00.000000Z"
    },
    "token": "1|abcdef123456...",
    "message": "Registration successful"
}</code></pre>
        </div>

        <h2 id="tasks">Tasks</h2>

        <div id="list-tasks" class="endpoint">
            <span class="method get">GET</span>
            <span class="endpoint-url">/api/tasks</span>

            <h4 class="mt-3">List all tasks</h4>
            <p>Retrieve all tasks for the authenticated user.</p>

            <h5>Headers</h5>
            <pre><code>Authorization: Bearer {your_token}
Accept: application/json</code></pre>

            <h5>Response (200 OK)</h5>
            <pre><code>[
    {
        "id": 1,
        "user_id": 1,
        "title": "Complete project documentation",
        "description": "Write comprehensive documentation",
        "due_date": "2024-01-31",
        "status": "pending",
        "created_at": "2024-01-01T12:00:00.000000Z",
        "updated_at": "2024-01-01T12:00:00.000000Z"
    }
]</code></pre>
        </div>

        <!-- Add more endpoints as needed -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>