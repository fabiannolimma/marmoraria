<?php
// Dados de exemplo para produtos e cliente
$products = [
    ['name' => 'Produto 1', 'price' => 100, 'quantity' => 2],
    ['name' => 'Produto 2', 'price' => 50, 'quantity' => 1],
];

$customer = [
    'name' => 'João Silva',
    'address' => 'Rua Principal, 123, Cidade Exemplo, Brasil',
    'email' => 'joao.silva@example.com',
];

// Função para calcular o valor total
function calculateTotal($products) {
    $total = 0;
    foreach ($products as $product) {
        $total += $product['price'] * $product['quantity'];
    }
    return $total;
}

// Gerar nota fiscal
function generateNotaFiscal($customer, $products) {
    $total = calculateTotal($products);
    $notaFiscal = "
    <h1>Nota Fiscal</h1>
    <p><strong>Cliente:</strong> {$customer['name']}</p>
    <p><strong>Endereço:</strong> {$customer['address']}</p>
    <p><strong>Email:</strong> {$customer['email']}</p>
    <table border='1' class='table table-bordered'>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Total</th>
        </tr>";
    
    foreach ($products as $product) {
        $productTotal = $product['price'] * $product['quantity'];
        $notaFiscal .= "
        <tr>
            <td>{$product['name']}</td>
            <td>{$product['price']}</td>
            <td>{$product['quantity']}</td>
            <td>{$productTotal}</td>
        </tr>";
    }

    $notaFiscal .= "
        <tr>
            <td colspan='3'><strong>Total</strong></td>
            <td><strong>{$total}</strong></td>
        </tr>
    </table>";

    return $notaFiscal;
}

// Exibir a nota fiscal
echo generateNotaFiscal($customer, $products);
?>