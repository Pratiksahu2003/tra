<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 10px 10px;
        }
        .field {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            background: white;
            padding: 12px;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }
        .message-box {
            background: white;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #764ba2;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
    </div>
    <div class="content">
        <div class="field">
            <span class="label">Name:</span>
            <div class="value">{{ $name }}</div>
        </div>
        
        <div class="field">
            <span class="label">Email:</span>
            <div class="value">{{ $email }}</div>
        </div>
        
        <div class="field">
            <span class="label">Subject:</span>
            <div class="value">{{ ucfirst(str_replace('_', ' ', $subject)) }}</div>
        </div>
        
        <div class="field">
            <span class="label">Message:</span>
            <div class="message-box">{{ $message }}</div>
        </div>
    </div>
</body>
</html>

