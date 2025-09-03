<?php

class Cart
{
    private array $items = [];
    private array $products = [];

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'name' => 'T-Shirt', 'price' => 59.90, 'stock' => 10],
            ['id' => 2, 'name' => 'Blusa moletom', 'price' => 129.90, 'stock' => 20],
            ['id' => 3, 'name' => 'Calça Jeans', 'price' => 199.90, 'stock' => 30],
        ];
    }

    public function addItem(int $id, int $quantity): string
    {
        $product = $this->findProduct($id);
        if (!$product) { 
            return "Produto não encontrado.";
        }
        if ($product['stock'] < $quantity) {
            return "Estoque insuficiente.";
        }

        foreach ($this->products as &$p) {
            if ($p['id'] === $id) {
                $p['stock'] -= $quantity;
            }
        }

        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $this->items[$id] = [
                'product_id' => $id,
                'quantity' => $quantity,
                'price' => $product['price'],
                'name' => $product['name'],
            ];
        }
        return "Produto adicionado!";
    }

    public function removeItem(int $id): string
    {
        if (!isset($this->items[$id])) {
            return "Produto não está no carrinho.";
        }

        foreach ($this->products as &$p) {
            if ($p['id'] === $id) {
                $p['stock'] += $this->items[$id]['quantity'];
            }
        }
        unset($this->items[$id]);
        return "Produto removido!";
    }

    public function listItems(): array
    {
        $output = [];
        foreach ($this->items as $item) {
            $output[] = [
                'name'     => $item['name'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['quantity'] * $item['price'],
            ];
        }
        return $output;
    }

    public function getTotal(): float
    {
        $sum = 0.0;
        foreach ($this->items as $item) {
            $sum += $item['quantity'] * $item['price'];
        }
        return $sum;
    }

    public function applyDiscount(float $total, string $coupon): float
    {
        if ($coupon === "DISCOUNT10") {
            return $total * 0.9;
        }
        return $total;
    }

    private function findProduct(int $id): ?array
    {
        foreach ($this->products as $p) {
            if ($p['id'] === $id) return $p;
        }
        return null;
    }
}