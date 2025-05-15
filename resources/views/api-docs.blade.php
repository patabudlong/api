<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/default.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            padding-top: 60px;
        }
        .navbar {
            background-color: #2c3e50;
        }
        .sidebar {
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            padding: 20px;
            background-color: #f8f9fa;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .endpoint {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .method {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            color: white;
            font-weight: bold;
        }
        .get { background-color: #61affe; }
        .post { background-color: #49cc90; }
        .put { background-color: #fca130; }
        .delete { background-color: #f93e3e; }
        .endpoint-url {
            display: inline-block;
            margin-left: 10px;
            font-family: monospace;
        }
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .nav-link {
            color: #2c3e50;
        }
        .nav-link:hover {
            color: #1a252f;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">API Documentation</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#authentication">Authentication</a>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#register">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#logout">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user-profile">User Profile</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tasks">Tasks</a>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#list-tasks">List Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#create-task">Create Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#get-task">Get Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#update-task">Update Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#delete-task">Delete Task</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#errors">Error Handling</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 main-content">
                <h1>API Documentation</h1>
                <p>Base URL: <code>http://your-domain.com/api</code></p>

                <section id="authentication">
                    <h2>Authentication</h2>

                    <div id="register" class="endpoint">
                        <span class="method post">POST</span>
                        <span class="endpoint-url">/register</span>
                        <h4>Register User</h4>
                        <h5>Request Headers</h5>
                        <pre><code>Content-Type: application/json
Accept: application/json</code></pre>
                        <h5>Request Body</h5>
                        <pre><code>{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}</code></pre>
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

                    <!-- Add similar blocks for login, logout, and user profile -->
                </section>

                <section id="tasks">
                    <h2>Tasks</h2>

                    <div id="list-tasks" class="endpoint">
                        <span class="method get">GET</span>
                        <span class="endpoint-url">/tasks</span>
                        <h4>List All Tasks</h4>
                        <h5>Request Headers</h5>
                        <pre><code>Authorization: Bearer {token}
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

                    <!-- Add similar blocks for create, get, update, and delete tasks -->
                </section>

                <section id="errors">
                    <h2>Error Handling</h2>
                    <div class="endpoint">
                        <h4>Validation Error (422 Unprocessable Entity)</h4>
                        <pre><code>{
    "message": "The given data was invalid.",
    "errors": {
        "field_name": [
            "Error message"
        ]
    }
}</code></pre>

                        <h4>Authentication Error (401 Unauthorized)</h4>
                        <pre><code>{
    "message": "Unauthenticated."
}</code></pre>

                        <h4>Authorization Error (403 Forbidden)</h4>
                        <pre><code>{
    "message": "This action is unauthorized."
}</code></pre>

                        <h4>Not Found Error (404 Not Found)</h4>
                        <pre><code>{
    "message": "Resource not found."
}</code></pre>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>
</html>