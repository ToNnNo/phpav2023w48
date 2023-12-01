<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lire une API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const response = await fetch('/api/client.php');
            const clients = await response.json();

            let html = "";
            for(client of clients) {
                html += `<tr>
    <td>${client.id}</td>
    <td>${client.firstname} ${client.lastname}</td>
    <td>${client.email}</td>
    <td>${client.phone}</td>
</tr>`
            }

            document.querySelector("#target").innerHTML = html;
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <header class="pt-5">
            <h1>Lire une API</h1>
            <hr />
        </header>
        <main>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody id="target"></tbody>
            </table>
        </main>
    </div>
</body>
</html>