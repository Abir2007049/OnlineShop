<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000; /* Black background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff; /* White card */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        .card p {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #555;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-title">Product Details</div>
        <p><strong>Fabric Type:</strong> {{ $data->FibreType }}</p>
        <p><strong>Sizes Available:</strong> {{ $data->Size }}</p>
    </div>

</body>
</html>
