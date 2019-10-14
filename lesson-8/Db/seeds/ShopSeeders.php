<?php


use Phinx\Seed\AbstractSeed;

class ShopSeeders extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $sql = 'TRUNCATE basket';
        $result = $this->adapter->query($sql);
        $basket = [
            [
                'session_id' => 'ilc4qq5fcrpm7m0utmeln919vcdu3bo4',
                'product_id' => '1'
            ],
            [
                'session_id' => 'ilc4qq5fcrpm7m0utmeln919vcdu3bo4',
                'product_id' => '2'
            ],
            [
                'session_id' => 'ilc4qq5fcrpm7m0utmeln919vcdu3bo4',
                'product_id' => '3'
            ],
            [
                'session_id' => 'pmjimq5t6j9in89dqkujcmdffi7lu69c',
                'product_id' => '4'
            ],
            [
                'session_id' => 'pmjimq5t6j9in89dqkujcmdffi7lu69c',
                'product_id' => '5'
            ],
            [
                'session_id' => 'ibf47rm15eiln3ibooq6964t96j20jc4',
                'product_id' => '1'
            ],
            [
                'session_id' => 'ibf47rm15eiln3ibooq6964t96j20jc4',
                'product_id' => '5'
            ],
            [
                'session_id' => 'ibf47rm15eiln3ibooq6964t96j20jc4',
                'product_id' => '6'
            ],
            [
                'session_id' => 'ibf47rm15eiln3ibooq6964t96j20jc4',
                'product_id' => '3'
            ],
        ];
        $this->table('basket')->insert($basket)->save();
        $sql = 'TRUNCATE products';
        $result = $this->adapter->query($sql);
        $products = [
            [
                'name' => 'Пицца',
                'description' => 'С сыром, круглая.',
                'price' => '22'
            ],
            [
                'name' => 'Пончик',
                'description' => 'Сладкий, с шоколадом.',
                'price' => '12'
            ],
            [
                'name' => 'Шоколад',
                'description' => 'Белый',
                'price' => '17'
            ],
            [
                'name' => 'Сникерс',
                'description' => 'Заморский',
                'price' => '25'
            ],
            [
                'name' => 'Компьютер',
                'description' => 'Переносной',
                'price' => '1500'
            ],
            [
                'name' => 'Колонки',
                'description' => 'Громкие',
                'price' => '450'
            ]
        ];
        $this->table('products')->insert($products)->save();

        $sql = 'TRUNCATE users';
        $this->adapter->query($sql);
        $users = [
            [
                'login' => 'admin',
                'pass' => '$2y$10$R5/eWDXskZDAFMsoMuY.nuCE7nCHsTC9ssu2yuT2X05IJ/aeBfJOi',
                'hash' => '9064513275d988e822988d9.40873284'
            ],
            [
                'login' => 'user',
                'pass' => '$2y$10$hVeXtdBdT0DI8NKp6jJX3e7OP3Gnjx7zMMT.4PcBhqwLFp/BjvQqS',
                'hash' => '20681558435d8f5ec8cae987.14685218'
            ],
            [
                'login' => 'newName',
                'pass' => '$2y$10$EQ9coH4e6Cb/zsf9sWtpO.Hgh.q2LUN4MtVMJ7efXXtzHXOqPaCo2',
                'hash' => '2914846835d9363064f7ed0.14616420'
            ]

        ];
        $this->table('users')->insert($users)->save();

        $sql = 'TRUNCATE orders';
        $this->adapter->query($sql);
        $orders = [
            [
                'name' => 'Петров Иван',
                'phone' => '+8978978977',
                'adress' => 'Москва',
                'session_id' => 'ilc4qq5fcrpm7m0utmeln919vcdu3bo4',
                'is_processed' => 0
            ],
            [
                'name' => 'Иванов Артем',
                'phone' => '+585948748418',
                'adress' => 'Москва',
                'session_id' => 'pmjimq5t6j9in89dqkujcmdffi7lu69c',
                'is_processed' => 0
            ],
            [
                'name' => 'John Mc',
                'phone' => '+894564651654',
                'adress' => 'London',
                'session_id' => 'ibf47rm15eiln3ibooq6964t96j20jc4',
                'is_processed' => 0
            ]
        ];
        $this->table('orders')->insert($orders)->save();
    }
}
