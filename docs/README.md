# Carrinho de Compra
------------------------------------------------------------------------------------------------------------------------------------------------

**Autores:** Cristhian Heber Pires da Silva e Alexandre Jose Gomes – RA: 2019595 / 1986088

------------------------------------------------------------------------------------------------------------------------------------------------

## Descrição
Projeto de carrinho de compras em PHP, onde é possível adicionar produtos, remover, calcular total e aplicar descontos.  

------------------------------------------------------------------------------------------------------------------------------------------------

## Estrutura de Pastas
```
Carrinho-de-Compra/
├─ src/
│ ├─ Cart.php # Classe do carrinho
│ └─ index.php # Exemplo de uso
├─ docs/
│ └─ documentação.md # Documentação adicional (opcional)
└─ README.md
```
------------------------------------------------------------------------------------------------------------------------------------------------

## Instruções de Execução (XAMPP)
1. Copie a pasta `Carrinho-de-Compra` para o diretório `htdocs` do XAMPP:

2. Inicie o **Apache** no painel de controle do XAMPP.  

3. Abra o navegador e acesse:

> O arquivo `index.php` contém exemplos de uso do carrinho.

------------------------------------------------------------------------------------------------------------------------------------------------

## Funcionalidades Implementadas

- Adicionar item ao carrinho (`addItem`)
  - Verifica existência do produto
  - Valida estoque disponível
- Remover item do carrinho (`removeItem`)
  - Reestabelece o estoque do produto
- Listar itens do carrinho (`listItems`)
- Calcular total do carrinho (`getTotal`)
- Aplicar desconto com cupom (`applyDiscount`)

------------------------------------------------------------------------------------------------------------------------------------------------

## Regras de Negócio

- Não é possível adicionar quantidade maior que o estoque disponível.
- Remover produto retorna o estoque ao estado inicial.
- Cupom `DISCOUNT10` aplica 10% de desconto sobre o total.

------------------------------------------------------------------------------------------------------------------------------------------------

## Limitações

- Não há persistência em banco de dados; todos os dados são mantidos em memória.
- Apenas um cupom fixo (`DISCOUNT10`) está implementado.
- Não há interface gráfica; execução via terminal ou navegador com `echo`.

------------------------------------------------------------------------------------------------------------------------------------------------

## Exemplos de Uso

```php
require 'Cart.php';

$cart = new Cart();

// Adicionar produtos
echo $cart->addItem(1, 2) . "<br>"; // 2 T-Shirts
echo $cart->addItem(3, 10) . "<br>"; // 10 Calças Jeans

// Remover produto
echo $cart->removeItem(1) . "<br>"; // Remove T-Shirt

// Total e desconto
$cart->addItem(2, 1); // 1 Blusa moletom
$total = $cart->getTotal();
echo "Total sem desconto: R$ $total <br>";
echo "Total com desconto: R$ " . $cart->applyDiscount($total, "DISCOUNT10") . "<br>";
```
