<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Notification</title>
    <style>
        /* General styling for the email */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header, .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
        .content .visitor-name {
            font-weight: bold;
            color: #333;
        }
        .footer p {
            font-size: 14px;
            color: #bbb;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Main Content -->
        <div class="content">
            <h1>Ticket Notification 👋</h1>

            <div >
            <p>Hello, you have sucessfully created a ticket <span class="visitor-name">{{ $name }}</span>.</p>
            </div>

            <p>subject: {{ $subject }}</p>
            <p>Problem: {{ $problem }}</p>
             <p>Status: {{ $status }}</p>
               <p>Agent: {{ $agent_id }}</p>
            <p>Description: {{ $description }}</p>
           
          
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Business Connexion Mozambique. All rights reserved.</p>
        </div>
    </div>

   
</body>
</html>