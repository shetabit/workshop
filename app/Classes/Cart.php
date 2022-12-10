<?php

namespace App\Classes;

class Cart
{
    protected array $items = [];

    public function addItem(string $code, string $name, int $quantity, int $price)
    {
        foreach($this->items as $index => $item) {
            if ($item['code'] === $code){
                $this->items[$index]['quantity'] += $quantity;
                return;
            }
        }

        $this->items[] = [
            'code' => $code,
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price
        ];
    }

    public function removeItem(string $code)
    {
        foreach($this->items as $index => $item) {
            if ($item['code'] === $code){
                if ($item['quantity'] > 1){
                    $this->items[$index]['quantity']--;
                }
                else {
                    unset($this->items[$index]);
                }

                return;
            }
        }

        throw new \Exception('Item not found in cart! Code='. $code);
    }

    public function getTotal():int
    {
        return array_reduce($this->items, fn($sum, $item) => $sum += $item['quantity'] * $item['price'], 0 );
    }

    public function getItemCount(): int
    {
        return array_reduce($this->items, fn($count, $item) => $count += $item['quantity'], 0 );
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
