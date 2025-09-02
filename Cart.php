<?php

class Cart
{
    private array $itens = [];
    private array $products = [];

    public function __construct(array &$products)
    {
        $this-> products = &$products;
    }

    // ADICIONANDO ITEM AO CARRINHO
    public function addItem(int $id, int $quantity) : string
    {
        $product = $this -> findProduct($id);

        if (!$product)
        {
            return "Produto não encontrado.";
        }

        if ($product['stock'] < $quantity)
        {
            return "Estoque insuficiente.";
        }

        foreach ($this -> products as &$p)
        {
            if ($p['id'] === $id)
            {
                $p['stock'] -= $quantity;
            }
        }

        if (isset ($this -> itens[$id]))
        {
            $this -> itens[$id]['quantity'] += $quantity;
        } else {
            $this -> itens[$id] = [
                'product_id' => $id,
                'quantity' => $quantity,
                'price' => $product['price'],
                'name' => $product['name'],
            ];
        }

        return "Produto adicionado!";
    }

    // REMOVENDO ITEM DO CARRINHO
    public function removeItem(int $id) : string
    {
        if (!isset($this -> itens[$id]))
        {
            return "Produto não está no carrinho.";
        }

        foreach ($this -> products as &$p)
        {
            if ($p['id'] === $id)
            {
                $p['stock'] += $this -> itens[$id]['quantity'];
            }
        }

        unset($this -> itens[$id]);
        return "Produto removido!";
    }

    // LISTANDO ITENS
    
    public function listItens() : array
    {
        $output = [];

        foreach ($this -> itens as $item)
        {
            $subtotal = $item['quantity'] * $item['price'];
            $output[] = [
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal,
            ];
        }

        return $output;
    }

    public function getTotal() : float
    {
        $sum = 0;

        foreach ($this -> itens as $item)
        {
            $sum += $item['quantity'] * $item['price'];
        }
        return $sum;
    }

    private function findProduct(int $id) : ?array
    {
        foreach ($this -> products as $p)
        {
            if ($p['id'] === $id)
            {
                return $p;
            }
        }

        return null;
    }

    
}