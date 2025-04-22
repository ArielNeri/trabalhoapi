<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja - Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            padding: 20px;
            color: #333;
        }
        .produtos {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
        }
        .produto {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 250px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .produto h2 {
            margin: 0 0 10px;
        }
        .erro {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Produtos Disponíveis</h1>
    <div class="produtos" id="produtos">Carregando produtos...</div>

    <script>
        fetch('api.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao carregar os produtos.');
                }
                return response.json();
            })
            .then(data => {
                const container = document.getElementById('produtos');
                container.innerHTML = '';

                if (data.erro) {
                    container.innerHTML = `<p class="erro">${data.erro}</p>`;
                    return;
                }

                data.forEach(produto => {
                    const card = document.createElement('div');
                    card.className = 'produto';
                    card.innerHTML = `
                        <h2>${produto.nome}</h2>
                        <p>Preço: R$ ${produto.preco.toFixed(2)}</p>
                    `;
                    container.appendChild(card);
                });
            })
            .catch(error => {
                document.getElementById('produtos').innerHTML = `<p class="erro">${error.message}</p>`;
            });
    </script>
</body>
</html>
