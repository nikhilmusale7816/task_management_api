<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1, h2, h3 {
            color: #333;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
        }
        code {
            background-color: #eee;
            padding: 2px 4px;
            border-radius: 3px;
        }
        ul {
            margin: 20px 0;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Task Management API</h1>

    <p>This is a Laravel-based Task Management API that allows users to create, assign, update, delete tasks, and add comments on tasks. The API also includes user authentication using token-based authentication (JWT).</p>

    <h2>Table of Contents</h2>
    <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#requirements">Requirements</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#database-setup">Database Setup</a></li>
        <li><a href="#running-the-application">Running the Application</a></li>
        <li><a href="#api-endpoints">API Endpoints</a></li>
        <li><a href="#testing-the-api">Testing the API</a></li>
        <li><a href="#license">License</a></li>
    </ul>

    <h2 id="features">Features</h2>
    <ul>
        <li>User registration and login (JWT Authentication)</li>
        <li>CRUD operations for tasks</li>
        <li>Assign tasks to users</li>
        <li>CRUD operations for comments on tasks</li>
        <li>Task deletion and updates are restricted to the user who created them</li>
    </ul>

    <h2 id="requirements">Requirements</h2>
    <ul>
        <li>PHP >= 8.1</li>
        <li>Composer</li>
        <li>MySQL or any other supported database</li>
        <li>Laravel 10</li>
    </ul>

    <h2 id="installation">Installation</h2>
    <ol>
        <li><strong>Clone the repository:</strong>
            <pre><code>git clone https://github.com/your-username/task-management-api.git
cd task-management-api</code></pre>
        </li>
        <li><strong>Install dependencies:</strong>
            <pre><code>composer install</code></pre>
        </li>
        <li><strong>Create a <code>.env</code> file:</strong>
            <p>Copy the <code>.env.example</code> file to <code>.env</code>:</p>
            <pre><code>cp .env.example .env</code></pre>
        </li>
        <li><strong>Generate an application key:</strong>
            <pre><code>php artisan key:generate</code></pre>
        </li>
    </ol>

    <h2 id="database-setup">Database Setup</h2>
    <ol>
        <li><strong>Configure the <code>.env</code> file:</strong>
            <p>Update your <code>.env</code> file with your database credentials:</p>
            <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=</code></pre>
        </li>
        <li><strong>Run database migrations:</strong>
            <pre><code>php artisan migrate</code></pre>
        </li>
    </ol>

    <h2 id="running-the-application">Running the Application</h2>
    <p>Start the Laravel development server:</p>
    <pre><code>php artisan serve</code></pre>
    <p>The application will be available at <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a>.</p>

    <h2 id="api-endpoints">API Endpoints</h2>

    <h3>Authentication</h3>
    <ul>
        <li><strong>Register:</strong> <code>POST /api/register</code></li>
        <li><strong>Login:</strong> <code>POST /api/login</code></li>
        <li><strong>Logout:</strong> <code>POST /api/logout</code> (requires token)</li>
        <li><strong>User Info:</strong> <code>GET /api/me</code> (requires token)</li>
    </ul>

    <h3>Tasks</h3>
    <ul>
        <li><strong>List Tasks:</strong> <code>GET /api/tasks</code> (requires token)</li>
        <li><strong>Create Task:</strong> <code>POST /api/tasks</code> (requires token)</li>
        <li><strong>Get Task Details:</strong> <code>GET /api/tasks/{taskId}</code> (requires token)</li>
        <li><strong>Update Task:</strong> <code>PUT /api/tasks/{taskId}</code> (requires token)</li>
        <li><strong>Delete Task:</strong> <code>DELETE /api/tasks/{taskId}</code> (requires token)</li>
    </ul>

    <h3>Comments</h3>
    <ul>
        <li><strong>List Comments:</strong> <code>GET /api/tasks/{taskId}/comments</code> (requires token)</li>
        <li><strong>Add Comment:</strong> <code>POST /api/tasks/{taskId}/comments</code> (requires token)</li>
        <li><strong>Get Comment:</strong> <code>GET /api/tasks/{taskId}/comments/{commentId}</code> (requires token)</li>
        <li><strong>Update Comment:</strong> <code>PUT /api/tasks/{taskId}/comments/{commentId}</code> (requires token)</li>
        <li><strong>Delete Comment:</strong> <code>DELETE /api/tasks/{taskId}/comments/{commentId}</code> (requires token)</li>
    </ul>

    <h2 id="testing-the-api">Testing the API</h2>
    <p>To test the API, you can use tools like Postman or cURL. Here are the steps to test the Comment APIs:</p>
    <ol>
        <li><strong>Obtain an authentication token</strong> by registering or logging in.</li>
        <li><strong>Create a task</strong> to associate comments with it.</li>
        <li><strong>List, create, update, and delete comments</strong> using the appropriate endpoints.</li>
    </ol>
    <p>Refer to the API Endpoints section for more details on each endpoint and the required parameters.</p>

    <h2 id="license">License</h2>
    <p>This project is open-sourced software licensed under the <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</p>

</body>
</html>
