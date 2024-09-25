<!DOCTYPE html>
<html lang="pt-BR">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #232424;
            color: #ffffff;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h1 {
            color: #333333;
        }
        .email-body p {
            line-height: 1.6;
            color: #666666;
        }
        .email-body a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .email-footer {
            margin-top: 20px;
            text-align: center;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>BECO</h1>
        </div>
        <div class="email-body">
            <h1>Recuperação de Senha</h1>
            <p>Olá,</p>
            <p>Você solicitou a redefinição da sua senha. Utilize o código abaixo para redefini-la, não o compartilhe com ninguém</p>
            <strong><?php echo $_REQUEST["cod"] ?></strong>
            <p>O código é válido por 5 minutos. <br> Se você não solicitou a redefinição de senha, por favor ignore este e-mail.</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 YourAppName. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>